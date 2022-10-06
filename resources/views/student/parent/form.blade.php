@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Data Orang Tua Wali" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card title="Data Ayah" md="8" lg="8">
    <form class="settings-form" method="POST">
      @csrf
      @isset($father_model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama"
        name="father_name"
        value="{{ $father_model->name ?? '' }}"
      />


      <x-admin.input
        label="Tanggal Lahir"
        name="father_birth_date"
        type="date"
        value="{{ $father_model->birth_date ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir"
        name="father_place_birth"
        value="{{ $father_model->place_birth ?? '' }}"
      />

      <x-admin.input
        label="Pekerjaan"
        name="father_profession"
        value="{{ $father_model->profession ?? '' }}"
      />

      <x-admin.input
        label="Pendidikan Terakhir"
        name="father_last_education"
        value="{{ $father_model->last_education ?? '' }}"
      />

      <x-admin.input
        label="Pendapatan per Bulan"
        name="father_income"
        type="number"
        value="{{ $father_model->income ?? '' }}"
      />

      <button type="submit" formaction="{{ $father_route }}" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>

  <div class="my-4"></div>

  <x-admin.card title="Data Ibu" md="8" lg="8">
    <form class="settings-form" method="POST" >
      @csrf
      @isset($mother_model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama"
        name="mother_name"
        value="{{ $mother_model->name ?? '' }}"
      />


      <x-admin.input
        label="Tanggal Lahir"
        name="mother_birth_date"
        type="date"
        value="{{ $mother_model->birth_date ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir"
        name="mother_place_birth"
        value="{{ $mother_model->place_birth ?? '' }}"
      />

      <x-admin.input
        label="Pekerjaan"
        name="mother_profession"
        value="{{ $mother_model->profession ?? '' }}"
      />

      <x-admin.input
        label="Pendidikan Terakhir"
        name="mother_last_education"
        value="{{ $mother_model->last_education ?? '' }}"
      />

      <x-admin.input
        label="Pendapatan per Bulan"
        name="mother_income"
        type="number"
        value="{{ $mother_model->income ?? '' }}"
      />

      <button type="submit" formaction="{{ $mother_route }}" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection