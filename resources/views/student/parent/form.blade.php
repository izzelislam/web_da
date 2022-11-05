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
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama Ayah"
        name="father_name"
        value="{{ $model->father_name ?? '' }}"
      />

      <x-admin.input
        label="NIK Ayah"
        type="number"
        name="father_nik"
        value="{{ $model->father_nik ?? '' }}"
      />


      <x-admin.input
        label="Tanggal Lahir Ayah"
        name="father_birth_date"
        type="date"
        value="{{ $model->father_birth_date ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir Ayah"
        name="father_place_birth"
        value="{{ $model->father_place_birth ?? '' }}"
      />

      <x-admin.input
        label="Pekerjaan Ayah"
        name="father_profession"
        value="{{ $model->father_profession ?? '' }}"
      />

      <x-admin.input
        label="Pendidikan Terakhir"
        name="father_last_education"
        value="{{ $model->father_last_education ?? '' }}"
      />

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Pendapatan per Bulan Ayah</label>
        <select name="father_income" id="" class="form-control @error('father_income')
          is-invalid
        @enderror">
          @if(!empty($model->father_income))
            <option value="{{ $model->father_income }}">{{ $model->father_income }}</option>
          @endif
          <option> -- pilih penghasilan ayah --</option>
          <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
          <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
          <option value="Lebih dari Rp. 3.000.000">Lebih dari Rp. 3.000.000</option>
        </select>
        @error('father_income')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      {{-- --------------------------------------------------- mother -----------}}

      <x-admin.input
        label="Nama Ibu"
        name="mother_name"
        value="{{ $model->mother_name ?? '' }}"
      />

      <x-admin.input
        label="NIK Ibu"
        name="mother_nik"
        type="number"
        value="{{ $model->mother_nik ?? '' }}"
      />


      <x-admin.input
        label="Tanggal Lahir Ibu"
        name="mother_birth_date"
        type="date"
        value="{{ $model->mother_birth_date ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir Ibu"
        name="mother_place_birth"
        value="{{ $model->mother_place_birth ?? '' }}"
      />

      <x-admin.input
        label="Pekerjaan Ibu"
        name="mother_profession"
        value="{{ $model->mother_profession ?? '' }}"
      />

      <x-admin.input
        label="Pendidikan Terakhir Ibu"
        name="mother_last_education"
        value="{{ $model->mother_last_education ?? '' }}"
      />

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Pendapatan per Bulan Ibu</label>
        <select name="mother_income" id="" class="form-control @error('mother_income')
          is-invalid
        @enderror">
          @if(!empty($model->mother_income))
            <option value="{{ $model->mother_income }}">{{ $model->mother_income }}</option>
          @endif
          <option> -- pilih penghasilan Ibu --</option>
          <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
          <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
          <option value="Lebih dari Rp. 3.000.000">Lebih dari Rp. 3.000.000</option>
        </select>
        @error('mother_income')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <button type="submit" formaction="{{ $parent_route }}" class="btn app-btn-primary" >Simpan dan lanjut mengisi data nasabah qurban</button>
    </form>
  </x-admin.card>
@endsection