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
        label="Judul"
        name="title"
        value="{{ $model->title ?? '' }}"
      />
      <x-admin.input
        label="Link"
        name="link"
        value="{{ $model->link ?? '' }}"
      />
      <x-admin.input
        label="Deskripsi"
        name="desc"
        value="{{ $model->desc ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection