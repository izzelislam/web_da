@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Setting" 
    {{-- route="{{ $create_route ?? '#' }}"   --}}
  />
@endsection

@section('content')
<x-admin.card md="8" lg="8">
  <form class="settings-form" method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    {{-- @isset($model)
      @method('PUT')
    @endisset --}}

    @if (isset($model->logo))
      <img src="{{ asset($model->logo) }}" alt="" width="80">
    @endif

    <x-admin.input
      label="Logo"
      name="photo"
      type="file"
      value="{{ $model->logo ?? '' }}"
    />

    <x-admin.input
      label="No Wa 1"
      name="wa_1"
      value="{{ $model->wa_1 ?? '' }}"
    />

    <x-admin.input
      label="No Wa 2"
      name="wa_2"
      value="{{ $model->wa_2 ?? '' }}"
    />

    <x-admin.input
      label="Instagram"
      name="instagram"
      value="{{ $model->instagram ?? '' }}"
    />

    <x-admin.input
      label="Youtube"
      name="youtube"
      value="{{ $model->youtube ?? '' }}"
    />

    <x-admin.input
      label="Email"
      name="email"
      value="{{ $model->email ?? '' }}"
    />

    <x-admin.input
      label="Alamat"
      name="address"
      type="text"
      value="{{ $model->address ?? '' }}"
    />

    <x-admin.input
      label="Tentang"
      name="about"
      type="text"
      value="{{ $model->about ?? '' }}"
    />

    <button type="submit" class="btn app-btn-primary" >Save Changes</button>
  </form>
</x-admin.card>
@endsection