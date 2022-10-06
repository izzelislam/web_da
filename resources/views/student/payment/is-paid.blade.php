@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card t md="12" lg="12">
    <div class="row">
      <div class="col-10 col-md-5 col-lg-5 m-auto">
        <img src="{{ asset('/images/component/paid.png') }}" alt="" class="img-fluid">
        @if (!empty($model))
          <div class="my-5 text-center">
            <h4 class="text-secondary">Menunggu konfirmasi dari admin</h4>
            <button class="btn btn-success text-white mt-3">hubunggi admin</button>
          </div>
        @endif
        @if (empty($model))
          <div class="my-5 text-center">
            <h4 class="text-secondary">Silahkan Melakukan Pembayaran Sebelum Melanjutkan Proses Selanjutnya</h4>
            <button class="btn btn-success text-white mt-3">Lakukan Pembayaran</button>
          </div>
        @endif
      </div>
    </div>
  </x-admin.card>
@endsection