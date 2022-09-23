@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ isset($model) ? 'Buat':'Buat' }} {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}" enctype="multipart/form-data">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Title"
        name="title"
        value="{{ $model->title ?? '' }}"
      />

      <x-admin.input
        label="Sub Title"
        name="sub_title"
        value="{{ $model->sub_title ?? '' }}"
      />

      <x-admin.input
        label="Gambar"
        type="file"
        name="image"
        value="{{ $model->img ?? '' }}"
      />

      <hr>
      <b class="text-danger"><i>optional</i></b>
      <hr>

      <x-admin.input
        label="Caption Button"
        name="button_text"
        value="{{ $model->button_text ?? '' }}"
      />

      <x-admin.input
        label="Link Button"
        name="button_link"
        value="{{ $model->button_link ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection