@extends('student.layouts.app')

{{-- @section('page-title')
  <x-admin.page-title 
    title="Biodata" 
    previous="{{ true }}"  
  />
@endsection --}}

@section('content')
  <x-admin.card md="8" lg="8">
    <form x-data="Biodata" class="settings-form" method="POST" action="{{ $route }}">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama Lengkap Peserta Didik"
        name="fullname"
        value="{{ $model->fullname ?? '' }}"
        note="* nama lengkap sesuai akta kelahiran"
      />

      <x-admin.input
        label="Nama Panggilan"
        name="name"
        value="{{ $model->name ?? '' }}"
      />

      <x-admin.input
        label="Hobi"
        name="hoby"
        value="{{ $model->hoby ?? '' }}"
      />

      <x-admin.input
        label="Cita Cita"
        name="goals"
        value="{{ $model->goals ?? '' }}"
      />

      <x-admin.input
        label="Tempat Lahir"
        name="brth_place"
        value="{{ $model->brth_place ?? '' }}"
      />

      <x-admin.input
        label="Tanggal Lahir"
        name="brth_date"
        type="date"
        value="{{ $model->brth_date ?? '' }}"
      />

      <x-admin.input
        label="NISN (berdasarkan IJAZAH/SKL)"
        name="nisn"
        type="number"
        value="{{ $model->nisn ?? '' }}"
      />

      <x-admin.input
        label="No Registrasi Akta Lahir"
        name="no_akta"
        type="number"
        value="{{ $model->no_akta ?? '' }}"
      />

      <x-admin.input
        label="Anak Ke?"
        name="order_of_birth"
        type="number"
        value="{{ $model->order_of_birth ?? '' }}"
      />

      <x-admin.input
        label="Jumlah Saudara"
        name="brothers"
        type="number"
        value="{{ $model->brothers ?? '' }}"
      />

      <x-admin.input
        label="Alamat Lengkap"
        name="address"
        value="{{ $model->address ?? '' }}"
      />

      <x-admin.input
        label="Rt"
        name="rt"
        value="{{ $model->rt ?? '' }}"
      />

      <x-admin.input
        label="Rw"
        name="rw"
        value="{{ $model->rw ?? '' }}"
      />

      <x-admin.input
        label="Kelurahan"
        name="village"
        value="{{ $model->village ?? '' }}"
      />

      {{-- provinsi --}}
      <div class="form-group mb-3">
        <label for="setting-input-2" class="form-label">Provinsi</label>
        <select 
          class="form-control @error('province_id') is-invalid @enderror select2" 
          x-model="province_id" 
          id="exampleFormControlSelect1" 
          name="province_id" 
          x-on:change="getRegencies(province_id)"
        >
          @if (isset($model->province))
            <option value="{{ $model->province->id }}" selected>{{ $model->province->name }}</option>
          @else
            <option value=""></option>
          @endif
          @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
          @endforeach
        </select>
      
        <small class="form-text text-muted">Pilih salah satu.</small>
        @error('province_id')
          <span class="invalid-feedback">
            {{ $message }}
          </span>
        @enderror
      </div>

      {{-- kabupaten --}}
      <div class="form-group mb-3">
        <label for="setting-input-2" class="form-label">Kabupaten</label>
        <select 
          class="form-control @error('regency_id') is-invalid @enderror" 
          x-model="regency_id" 
          id="exampleFormControlSelect1" 
          name="regency_id" 
          x-on:change="getDistrict(regency_id)"
        >
        
        @if(isset($model->regency))
          <option value="{{ $model->regency->id }}" selected>{{ $model->regency->name }}</option>
        @else
          <option value=""></option>
        @endif
        <template x-for="regency in res_regencies">
          <option :value="regency.id"><span x-text="regency.name"></span></option>
        </template>
          
        </select>
      
        <small class="form-text text-muted">Pilih salah satu.</small>
        @error('regency_id')
          <span class="invalid-feedback">
            {{ $message }}
          </span>
        @enderror
      </div>
       
      {{-- kecamatan --}}
      <div class="form-group mb-3">
        <label for="setting-input-2" class="form-label">Kecamatan</label>
        <select 
          class="form-control @error('district_id') is-invalid @enderror" 
          id="exampleFormControlSelect1" 
          name="district_id" 
        >
        
        @if(isset($model->district))
          <option value="{{ $model->district->id }}" selected>{{ $model->district->name }}</option>
        @else
          <option value=""></option>
        @endif
        <template x-for="district in res_districts">
          <option :value="district.id"><span x-text="district.name"></span></option>
        </template>
        {{-- <option value="{{ $province->id }}">{{ $province->name }}</option> --}}
        </select>
      
        <small class="form-text text-muted">Pilih salah satu.</small>
        @error('district_id')
          <span class="invalid-feedback">
            {{ $message }}
          </span>
        @enderror
      </div>

      <x-admin.input
        label="Bahasa Sehari-Hari"
        name="language"
        value="{{ $model->language ?? '' }}"
      />

      <x-admin.input
        label="Kode Pos"
        name="postal_code"
        value="{{ $model->postal_code ?? '' }}"
      />

      {{-- ukuran baju --}}
      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Ukuran Baju Seragam (WUSHTHA)</label>
        <select name="cloth_size" id="" class="form-control @error('cloth_size')
          is-invalid
        @enderror">
          @if(!empty($model->cloth_size))
            <option value="{{ $model->cloth_size }}">{{ $model->cloth_size }}</option>
          @endif
          <option> -- pilih ukuran baju seragam --</option>
          <option value="M:(LD=90cm,PB=124cm)">M:(LD=90cm,PB=124cm)</option>
          <option value="L:(LD=100cm,PB=130cm)">L:(LD=100cm,PB=130cm)</option>
          <option value="XL:(LD=108cm,PB=135cm)">XL:(LD=108cm,PB=135cm)</option>
          <option value="XXL:(LD=116cm,PB=140cm)">XXL:(LD=116cm,PB=140cm)</option>
        </select>
        @error('cloth_size')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Ukuran Baju Seragam (I'DAD, MU'ALLIMAT, TQM)</label>
        <select name="cloth_size" id="" class="form-control @error('cloth_size')
          is-invalid
        @enderror">
          @if(!empty($model->cloth_size))
            <option value="{{ $model->cloth_size }}">{{ $model->cloth_size }}</option>
          @endif
          <option> -- pilih ukuran baju seragam --</option>
          <option value="M:(LD=90cm,PB=128-130cm)">M:(LD=90cm,PB=128-130cm)</option>
          <option value="L:(LD=108cm,PB=135cm)">L:(LD=108cm,PB=135cm)</option>
          <option value="XL:(LD=116-120cm,PB=140cm)">XL:(LD=116-120cm,PB=140cm)</option>
          <option value="XXL:(LD=120-130cm,PB=145cm)">XXL:(LD=120-130cm,PB=145cm)</option>
        </select>
        @error('cloth_size')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <x-admin.input
        label="No Wali"
        name="no_wali"
        type="number"
        value="{{ $model->no_wali ?? '' }}"
      />

      {{-- keadaaan jasmani --}}

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

      <x-admin.input
        label="Minus berapa Meter?"
        name="minus"
        type="number"
        note="*diiis jika mata minus"
        value="{{ $model->minus ?? '' }}"
      />

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
      <div class="d-flex justify-content-between">
        <a href="{{ route('home-page', ['ticket' => request()->ticket]) }}" class="btn btn-warning">Kembali ke halam sebelunya </a>
        <button type="submit" class="btn btn-info" >Simpan dan lanjut Mengisi Biodata Orangtua</button>
      </div>
    </form>
  </x-admin.card>
@endsection

@push('addon-script')
  <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>

  <script>
    function Biodata(){
      const regencies = @json($regencies);
      const districts = @json($districts);
      return {
        // data
        province_id: '',
        regency_id: '',
        res_regencies: [],
        res_districts: [],
        //method
        getRegencies(param){
          const newRegencies = regencies.filter(regency => regency.province_id == param);
          console.log(regencies)
          this.res_regencies = newRegencies;
        },
        getDistrict(param){
          const newDistricts = districts.filter(district => district.regency_id == param);
          this.res_districts = newDistricts;
        }
      }
    }
  </script>
@endpush