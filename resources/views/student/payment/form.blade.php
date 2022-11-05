@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Pembayaran" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card t md="8" lg="8">
    @isset($model)
      <div class="mb-4">
        <h6 class="text-danger"><i>* Anda sudah megupload bukti pembayaran silakan kirim ulang jika anda ingin menganti.</i></h6>
        <img class="img-fluid" src="{{ asset($model->img) }}" alt="">
      </div>
    @endisset
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

      <button type="submit" class="btn app-btn-primary" >Upload Bukti Pembayaran</button>
    </form>
  </x-admin.card>
@endsection