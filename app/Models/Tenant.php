<?php

namespace App\Models;

use App\Tenant\Traits\UserTenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Tenant extends Model
{
    use HasFactory;

    use UserTenantTrait;

    protected $fillable = [
        'uuid', 'cnpj', 'name', 'url', 'email', 'logo', 'timbre', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active',
        'subscription_suspended', 'INEP', 'CADASTRO', 'DO', 'ATO', 'ENDERECO', 'CIDADE', 'ESTADO', 'CEP', 'plan_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function classifications()
    {
        return $this->hasMany(Classification::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }
    public function documents()
    {
        return $this->hasMany(Documento::class);
    }

    public function solicitations()
    {
        return $this->hasMany(Solicitation::class);
    }

    public function classes()
    {
        return $this->hasMany(Turma::class);
    }

    public function shifts()
    {
        return $this->hasMany(Turno::class);
    }
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
    public function images()
    {
        return $this->hasMany(TenantImages::class);
    }
    /* Atualiza os dados do Tenant/Escola */
    public function updateExisting($request, $tenant)
    {
        $data = $request->except('logo', 'timbre');

        if ($request->hasFile('logo') && $request->logo->isValid()) {
            /* Busca e Apaga o logo do Storage e da tabela "tenant_images" */
            $tenant_images = TenantImages::where('tenant_id', $tenant->id)->get();

            if ($tenant_images->count() > 0) {
                foreach ($tenant_images as $tenant_image) {
                    if ($tenant_image->logo == null) {
                        $logo = $request->logo->store("tenants/{$tenant->id}/imagens");
                        $tenant->images()->update(['logo' => $logo]);
                    } else {
                        Storage::delete($tenant_image->logo);
                        $logo = $request->logo->store("tenants/{$tenant->id}/imagens");
                        $tenant->images()->update(['logo' => $logo]);
                    }
                }
            } else {
                /* Adiciona na tabela o path do logo e no storage o arquivo */
                $logo = $request->logo->store("tenants/{$tenant->id}/imagens");
                $tenant = $tenant->images()->create(['tenant_id' => $tenant->id, 'logo' =>  $logo]);
            }
        }
        //          
        if ($request->hasFile('timbre') && $request->timbre->isValid()) {
            /* Busca e Apaga o Timbre do Storage e da tabela "tenant_images" */
            $tenant_images = TenantImages::where('tenant_id', $tenant->id)->get();

            if ($tenant_images->count() > 0) {
                foreach ($tenant_images as $tenant_image) {
                    if ($tenant_image->timbre == null) {
                        $timbre = $request->timbre->store("tenants/{$tenant->id}/imagens");
                        $tenant->images()->update(['timbre' => $timbre]);
                    } else {
                        Storage::delete($tenant_image->timbre);
                        $timbre = $request->timbre->store("tenants/{$tenant->id}/imagens");
                        $tenant->images()->update(['timbre' => $timbre]);
                    }
                }
            } else {
                /* Adiciona na tabela o path do timbre e no storage o arquivo */
                $timbre = $request->timbre->store("tenants/{$tenant->id}/imagens");
                $tenant = $tenant->images()->create(['tenant_id' => $tenant->id, 'timbre' =>  $timbre]);
            }
        }
        try {
            $tenant->update($data);
            return true;
        } catch (\Throwable $th) {
            throw $th;          
            return false;
        }
    }
}
