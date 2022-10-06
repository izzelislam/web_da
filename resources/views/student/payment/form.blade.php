@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Pembayaran" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card t md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}" enctype="multipart/form-data">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Bukti Pembayaran"
        name="image"
        type="file"
        value="{{ $model->img ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection