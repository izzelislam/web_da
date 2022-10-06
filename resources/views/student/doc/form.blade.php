@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Dakumen" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
<div class="row">
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Tanda Kelulusan"
        name="ijazah"
        type="file"
        value="{{ $model->ijazah ?? '' }}"
      />
      
      <x-admin.input
        label="Akta Kelahiran"
        name="akta"
        type="file"
        value="{{ $model->akta ?? '' }}"
      />

      <x-admin.input
        label="Kartu Keluarga"
        name="family_card"
        type="file"
        value="{{ $model->family_card ?? '' }}"
      />

      <x-admin.input
        label="Bukti Pembayaran"
        name="payment"
        type="file"
        value="{{ $model->payment ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
  <x-admin.card md="4" lg="4">
    <div class="row">
      <div class="col">
        <table class="table">
          <tr>
            <th>Nama Dokumen</th>
            <th>preview</th>
          </tr>
          <tr>
            <td>Surat kelulusan</td>
            <td>
              <img src="{{ asset('/dumy/kelulusan.jpg') }}" width="100" alt="">
            </td>
          </tr>
          <tr>
            <td>Kartu Keluarga</td>
            <td>
              <img src="{{ asset('/dumy/kelulusan.jpg') }}" width="100" alt="">
            </td>
          </tr>
          <tr>
            <td>Akta Kelahiran</td>
            <td>
              <img src="{{ asset('/dumy/kelulusan.jpg') }}" width="100" alt="">
            </td>
          </tr>
          <tr>
            <td>Bukti Pembayaran</td>
            <td>
              <img src="{{ asset('/dumy/kelulusan.jpg') }}" width="100" alt="">
            </td>
          </tr>
        </table>
      </div>
    </div>
  </x-admin.card>
</div>
@endsection