@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Biodata" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama"
        name="name"
        value="{{ $model->name ?? '' }}"
      />

      <x-admin.input
        label="Nama Lengkap"
        name="fullname"
        value="{{ $model->fullname ?? '' }}"
      />

      <x-admin.input
        label="Tanggal Lahir"
        name="brth_date"
        type="date"
        value="{{ $model->brth_date ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir"
        name="brth_place"
        value="{{ $model->brth_place ?? '' }}"
      />

      <x-admin.input
        label="Jumlah Saudara"
        name="brothers"
        type="number"
        value="{{ $model->brothers ?? '' }}"
      />

      <x-admin.input
        label="Anak Ke?"
        name="order_of_birth"
        type="number"
        value="{{ $model->order_of_birth ?? '' }}"
      />

      <x-admin.input
        label="Bahasa Sehari-Hari"
        name="language"
        value="{{ $model->language ?? '' }}"
      />

      <x-admin.input
        label="Alamat Lengkap"
        name="address"
        value="{{ $model->address ?? '' }}"
      />

      <x-admin.input
        label="Rt/Rw"
        name="rt_rw"
        value="{{ $model->rt_rw ?? '' }}"
      />

      <x-admin.input
        label="Kelurahan"
        name="village"
        value="{{ $model->village ?? '' }}"
      />

      <x-admin.input
        label="Kecamatan"
        name="district"
        value="{{ $model->district ?? '' }}"
      />

      <x-admin.input
        label="Kabupaten"
        name="regency"
        value="{{ $model->regency ?? '' }}"
      />

      <x-admin.input
        label="Provinsi"
        name="province"
        value="{{ $model->province ?? '' }}"
      />

      <x-admin.input
        label="Tinggi Badan"
        name="height"
        type="number"
        value="{{ $model->height ?? '' }}"
      />

      <x-admin.input
        label="Berat Badan"
        name="weight"
        type="number"
        value="{{ $model->weight ?? '' }}"
      />

      <x-admin.input
        label="Penyakit Yang Sedang Diderita"
        name="disease_present"
        value="{{ $model->disease_present ?? '' }}"
      />

      <x-admin.input
        label="Penyakit Yang Pernah Diderita"
        name="disease_once"
        value="{{ $model->disease_once ?? '' }}"
      />

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Peglihatan</label>
        <select name="vision" id="" class="form-control @error('vision')
          is-invalid
        @enderror">
          <option> -- pilih penglihatan --</option>
          <option
            @if (!empty($model))
              @if ($model->vision == 1)
                selected
              @endif
            @endif
            value="1">Normal</option>
          <option
            @if (!empty($model))
              @if ($model->vision == 0)
                selected
              @endif
            @endif
            value="0">Tidak</option>
        </select>
        @error('vision')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Pendengaran</label>
        <select name="hearing" id="" class="form-control @error('hearing')
          is-invalid
        @enderror">
          <option> -- pilih pendengaran --</option>
          <option
            @if (!empty($model))
              @if ($model->vision == 1)
                selected
              @endif
            @endif
            value="1">Normal</option>
          <option
            @if (!empty($model))
              @if ($model->vision == 0)
                selected
              @endif
            @endif
            value="0">Tidak</option>
        </select>
        @error('hearing')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Golongan Darah</label>
        <select name="blood" id="" class="form-control @error('blood')
          is-invalid
        @enderror">
          <option >-- pilih gol darah --</option>
          <option
            @if (!empty($model))
              @if ($model->blood == 'A')
                selected
              @endif
            @endif
            value="A">A</option>
          <option
            @if (!empty($model))
              @if ($model->blood == 'B')
                selected
              @endif
            @endif
            value="B">B</option>
          <option
            @if (!empty($model))
              @if ($model->blood == 'AB')
                selected
              @endif
            @endif
            value="AB">AB</option>
          <option
            @if (!empty($model))
              @if ($model->blood == 'O')
                selected
              @endif
            @endif
            value="O">O</option>
          <option
            @if (!empty($model))
              @if ($model->blood == '-')
                selected
              @endif
            @endif
            value="-">-</option>
        </select>
        @error('blood')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>
      
      <x-admin.input
        label="Asal Sekolah"
        name="prev_school"
        value="{{ $model->prev_school ?? '' }}"
      />

      <x-admin.input
        label="Pindah Dari Sekolah"
        name="moved_school"
        value="{{ $model->moved_school ?? '' }}"
      />

      <x-admin.input
        label="Lama Belajar"
        name="learn_duration"
        value="{{ $model->learn_duration ?? '' }}"
      />

      <x-admin.input
        label="Diterima Di Sekolah Ini Pada ?"
        name="accepted_at"
        type="date"
        value="{{ $model->accepted_at ?? '' }}"
      />

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Alasan Pindah</label>
        <textarea name="moved_reason" id="" cols="50" rows="50" class="form-control">
          {{  $model->moved_reason ?? '' }}
        </textarea>
        @error('moved_reason')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection