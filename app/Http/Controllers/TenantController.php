<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use App\Models\TenantImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;

        // $this->middleware(['can:tenants']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('admins');
        $user  = Auth::user()->tenant_id;
        $tenants = $this->repository->latest()->paginate();
        // $tenants = $this->repository->with('users')->where('id', $user)->latest()->paginate();
        $title = 'Empresa';
        return view('tenants.index', compact('tenants', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTenant  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTenant $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('tenants.edit', compact('tenant'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateTenant  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenant $request, $id)
    {

        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->except('logo','timbre');

        if ($request->hasFile('logo') && $request->logo->isValid()) {

            // if (Storage::exists($tenant->logo)) {
            //     Storage::delete($tenant->logo);
            // }

            /* Busca e Apaga o logo do Storage e da tabela "tenant_images" */
            $tenant_images = TenantImages::where('tenant_id', $tenant->id)->get();
                dd($tenant_images->logo);
            if($tenant_images->count() > 0 && $tenant_images->logo != null){
                // DB::table('tenant_images')->where('tenant_id', $tenant->id)->delete();
                DB::table('tenant_images')->where('tenant_id', $tenant->id)->UPDATE(['logo' => null]);
                Storage::delete($tenant_images->logo);
            }
            /* Adiciona na tabela o path do logo e no storage o arquivo */
            $data['logo'] = $request->logo->store("tenants/{$tenant->id}/imagens");
            $tenant = $tenant->images()->create(['tenant_id' => $tenant->id, 'logo' => $data['logo']]);
        }
        // if ($request->hasFile('timbre') && $request->timbre->isValid()) {
        //     if (Storage::exists($tenant->timbre)) {
        //         Storage::delete($tenant->timbre);
        //     }
        //     $data['timbre'] = $request->timbre->store("tenants/{$tenant->id}");
        // }

        $tenant->update($data);

        return redirect()->route('tenants.index')->with('message', 'Operação Realizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($tenant->logo)) {
            Storage::delete($tenant->logo);
        }
        if (Storage::exists($tenant->timbre)) {
            Storage::delete($tenant->timbre);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $tenants = $this->repository->where(function ($query) use ($request) {
            if ($request->filter) {
                $query->where('name', $request->filter);
            }
        })->latest()->paginate();

        return view('tenants.index', compact('tenants', 'filters'));
    }
}
