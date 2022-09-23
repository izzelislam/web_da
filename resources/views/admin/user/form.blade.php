@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ isset($model) ? 'Buat':'Buat' }} {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama"
        name="name"
        value="{{ $model->name ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection