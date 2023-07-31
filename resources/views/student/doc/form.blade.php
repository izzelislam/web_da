@extends('student.layouts.app')

{{-- @section('page-title')
  <x-admin.page-title 
    title="Dakumen" 
    previous="{{ true }}"  
  />
@endsection --}}

@section('content')
<div class="row">
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}" enctype="multipart/form-data">
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

      <div class="d-flex justify-content-between">
        <a href="{{ route('student-parent.create', ['ticket' => request()->ticket]) }}" class="btn btn-warning">Kembali ke halam sebelunya </a>
        {{-- <button type="submit" class="btn btn-info" >Simpan dan lanjut Mengisi Biodata Orangtua</button> --}}
        <button type="submit" class="btn btn-info" >Simpan dan lanjut mengisi data nasabah qurban</button>
      </div>
    </form>
  </x-admin.card>
  @isset($model)
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
                <embed src="{{ asset($model->ijazah) }}" width="150" type="">
                </td>
              </tr>
              <tr>
                <td>Kartu Keluarga</td>
                <td>
                <embed src="{{ asset($model->family_card) }}" width="150" type="">
                </td>
              </tr>
              <tr>
                <td>Akta Kelahiran</td>
                <td>
                <embed src="{{ asset($model->akta) }}" width="150" type="">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </x-admin.card>
  @endisset
</div>
@endsection