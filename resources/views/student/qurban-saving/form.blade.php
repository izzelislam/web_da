@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Formulir akad tabungan hewan qurban" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <div class="mb-4">
      <h1>AKAD KESANGGUPAN NASABAH</h1>
      <h5>Formulir ini wajib di isi oleh orang tua wali</h5>
    </div>
    <form class="settings-form" method="POST">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Hewan Qurban</label>
        <select name="qurban" id="" class="form-control @error('qurban')
          is-invalid
        @enderror">
          @if(!empty($model->qurban))
            <option value="{{ $model->qurban }}">{{ $model->qurban }}</option>
          @endif
          <option> -- pilih hewan qurban --</option>
          <option value="Kambing">Kambing</option>
          <option value="Sapi">Sapi (kolektif 7 orang @Rp 3.500.000)</option>
        </select>
        @error('qurban')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Tipe Hewan Qurban</label>
        <select name="qurban_type" id="" class="form-control @error('qurban_type')
          is-invalid
        @enderror">
          @if(!empty($model->qurban_type))
            <option value="{{ $model->qurban_type }}">{{ $model->qurban_type }}</option>
          @endif
          <option> -- pilih tipe qurban_type --</option>
          <option value="A. Rp. 3.500.000">A. Rp. 3.500.000</option>
          <option value="B. Rp. 3.000.000">B. Rp. 3.000.000</option>
          <option value="C. Rp. 2.500.000">C. Rp. 2.500.000</option>
        </select>
        @error('qurban_type')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mt-5 mb-3">
        <hr>
        <h6>Cicilan Tabungan Qurban perbulan</h6>
        <small><b>silakan pilih salah satu</b></small>
        <hr>
      </div>

      @if (!empty($model))
        @if($model->instalment)
          <div class="card p-3 mb-3">
            <h4>
              Tipe cicilan yang anda pilih : {{ $model->instalment }}
            </h4>
            <small class="text-danger"><i><b>* Silakan pilih ulang jika ingin merubah tipe cicilan</b></i></small>
          </div>
        @else
          <div class="card p-3 mb-3">
            <h5 class="text-danger">
              Anda belum memilih tipe cicilan, Silakan pilih salah satu dibawah ini!
            </h6>
          </div>
        @endif
      @endif
      
      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Cicilan 12 bulan</label>
        <select name="month_12" id="" class="form-control @error('month_12')
          is-invalid
        @enderror">
          <option value=""> -- pilih tipe cicilan 12 bulan --</option>
          <option value="A. Rp. 295.000">A. Rp. 295.000</option>
          <option value="B. Rp. 250.000">C. Rp. 250.000</option>
          <option value="C. Rp. 210.000">C. Rp. 210.000</option>
        </select>
        @error('month_12')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Cicilan 24 bulan</label>
        <select name="month_24" id="" class="form-control @error('month_24')
          is-invalid
        @enderror">
          <option value=""> -- pilih tipe cicilan 24 bulan --</option>
          <option value="A. Rp. 150.000">A. Rp. 150.000</option>
          <option value="B. Rp. 125.000">C. Rp. 125.000</option>
          <option value="C. Rp. 105.000">C. Rp. 105.000</option>
        </select>
        @error('month_24')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Cicilan 36 bulan</label>
        <select name="month_36" id="" class="form-control @error('month_36')
          is-invalid
        @enderror">
          <option value=""> -- pilih tipe cicilan 36 bulan --</option>
          <option value="A. Rp. 100.000">A. Rp. 100.000</option>
          <option value="B. Rp. 85.000">C. Rp. 85.000</option>
          <option value="C. Rp. 70.000">C. Rp. 70.000</option>
        </select>
        @error('month_36')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>
      
      <div class="form-check mb-4">
        <input name="is_accept" required class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Saya dengan ini mengajukan permohonan mengikuti program tabungan
        </label>
      </div>
      
      <button type="submit" formaction="{{ $route }}" class="btn app-btn-primary" >Simpan data</button>
      @if (!empty($model))
        <a href="{{ route('payment.index') }}"  class="btn text-white btn-info" >Lanjut ke pembayaran</a>
      @endif
    </form>
  </x-admin.card>
@endsection