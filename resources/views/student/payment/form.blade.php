@extends('student.layouts.app')

{{-- @section('page-title')
  <x-admin.page-title 
    title="Pembayaran" 
    previous="{{ true }}"  
  />
@endsection --}}

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

      <x-admin.input
        label="Bukti Pembayaran"
        name="image"
        type="file"
        value="{{ $model->img ?? '' }}"
      />

      <div class="d-flex justify-content-between">
        <a href="{{ route('student-qurban-saving.create', ['ticket' => request()->ticket]) }}" class="btn btn-warning">Kembali ke halam sebelunya </a>
        {{-- <button type="submit" class="btn btn-info" >Simpan dan lanjut Mengisi Biodata Orangtua</button> --}}
        <button type="submit" class="btn btn-info" >Upload bukti pembayaran dan selesaikan proses pendaftaran</button>
      </div>

    </form>
  </x-admin.card>
@endsection