@extends('layouts.app')

@section('content')

  <script src="{{ url('js/confirmar.js') }}"></script>

  <div class="grid grid-flow-row auto-rows-max md:auto-rows-min mx-8">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item "><a href="{{ route('tenants.index') }}">Escola</a></li>
      <li class="breadcrumb-item "><a href="{{ route('tenants.edit', $tenant->id) }}">Edit</a></li>
    </ol>
    <h3>Editar a empresa {{ $tenant->name }}</h3>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('tenants.update', $tenant->id) }}" class="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @include('tenants.form')
        </form>
      </div>
    </div>
  </div>

@stop
