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
            <h4 class="text-secondary">Bukti pembayaran berhasi di unggah silakan konfirmasi pembayaran</h4>
            @if (!empty(SettingData()->wa_1))
              <a target="blank" href="https://api.whatsapp.com/send/?phone={{ settingData()->wa_1 }}&text=Saya+{{ Auth::user()->name }}+inggin+konfirmasi+biaya+pendaftaran+link+bukti+&app_absent=0" class="btn btn-success text-white mt-3">konfirmasi admin 1</a>
            @endif
            @if (!empty(SettingData()->wa_2))
              <a target="blank" href="https://api.whatsapp.com/send/?phone={{ settingData()->wa_2 }}&text=Saya+{{ Auth::user()->name }}+inggin+konfirmasi+biaya+pendaftaran+link+bukti+&app_absent=0" class="btn btn-success text-white mt-3">hubunggi admin 2</a>
            @endif
            <div class="my-3">
              jika tombol diatas tidak berfungsi silakan hubunggi admin di {{ settingData()->wa_1 ?? '' }} atau {{ settingData()->wa_2 ?? '' }}
            </div>
          </div>

        @endif
        @if (empty($model))
          <div class="my-5 text-center">
            <h4 class="text-secondary">Silahkan Melakukan Pembayaran Sebelum Melanjutkan Proses Selanjutnya</h4>
            <a href="{{ route('payment.index') }}" class="btn btn-success text-white mt-3">Lakukan Pembayaran</a>
          </div>
        @endif
      </div>
    </div>
  </x-admin.card>
@endsection