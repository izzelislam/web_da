@extends('student.layouts.app')

{{-- @section('page-title')
  <x-admin.page-title 
    title="Pembayaran" 
    previous="{{ true }}"  
  />
@endsection --}}

@section('content')
<div class="d-flex justify-content-between">
  <a href="{{ route('student-payment.index', ['ticket' => request()->ticket]) }}" class="btn btn-warning">Kembali ke halam sebelunya </a>
  {{-- <button type="submit" class="btn btn-info" >Simpan dan lanjut Mengisi Biodata Orangtua</button> --}}
</div>
<x-admin.card
  md="8" lg="8"
  >
  <div class="text-center">
    <h1>DETAIL DATA PENDAFTAR</h1>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-2"><strong>Nama:</strong> {{ $model->name ?? '' }}</div>
      <div class="mb-2"><strong>NIK:</strong> {{ $model->nik ?? '' }}</div>
      <div class="mb-2"><strong>Email:</strong> {{ $model->email ?? '' }}</div>
      <div class="mb-2"><strong>No Hp:</strong> {{ $model->phone_number ?? '' }}</div>
      <div class="mb-2"><strong>Tanggal Daftar:</strong> {{ $model->created_at->format('d/m/Y') ?? '' }}</div>
      <div class="mb-2"><strong>Unit:</strong> {{ $model->unit->name ?? '' }}</div>
      <div class="mb-2"><strong>Kode Pendaftaran:</strong> {{ $model->code ?? '' }}</div>
      <div class="mb-2"><strong>Jenis Kelamin:</strong> {{ $model->gender ?? '' }}</div>
    </div>
    <div class="col">
      <img src="{{ asset($model->image) ?? '' }}" alt="foto_profil" width="150px">
    </div>
  </div>

  {{-- <div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div> --}}
  {{-- <div class="row justify-content-between">
    <div class="col-auto">
        <a class="btn app-btn-primary" href="#">Upgrade Plan</a>
    </div>
    <div class="col-auto">
        <a class="btn app-btn-secondary" href="#">Cancel Plan</a>
    </div>
  </div> --}}
  </x-admin.card>

  <div class="my-4"></div>

  @if (!empty($model->biodata))
  <x-admin.card
    title="Biodata"
    md="8" lg="8"
  >
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Nama Lengkap: </strong> {{ $model->biodata->fullname ?? ''}}</div>
        <div class="mb-2"><strong>Nama Panggilan:</strong> {{ $model->biodata->name ?? '' }}</div>
        <div class="mb-2"><strong>Hobi:</strong> {{ $model->biodata->hoby ?? '' }}</div>
        <div class="mb-2"><strong>Cita Cita:</strong> {{ $model->biodata->goals ?? '' }}</div>
        <div class="mb-2"><strong>Tanggal Lahir:</strong> {{ $model->biodata->brth_date ?? '' }}</div>
        <div class="mb-2"><strong>Tempat Lahir:</strong> {{ $model->biodata->brth_place ?? '' }}</div>
        <div class="mb-2"><strong>NISN:</strong> {{ $model->biodata->nisn ?? '' }}</div>
        <div class="mb-2"><strong>No Akta:</strong> {{ $model->biodata->no_akta ?? '' }}</div>
        <div class="mb-2"><strong>Ukuran Baju:</strong> {{ $model->biodata->cloth_size ?? '' }}</div>
        <div class="mb-2"><strong>No Telepon Wali:</strong> {{ $model->biodata->no_wali ?? '' }}</div>
        <div class="mb-2"><strong>Anak Ke:</strong> {{ $model->biodata->order_of_birth ?? '' }}</div>
        <div class="mb-2"><strong>Bahasa:</strong> {{ $model->biodata->language ?? '' }}</div>
        <div class="mb-2"><strong>Alamat:</strong> {{ $model->biodata->address ?? '' }}</div>
        <div class="mb-2"><strong>RT:</strong> {{ $model->biodata->rt ?? '' }}</div>
        <div class="mb-2"><strong>RW:</strong> {{ $model->biodata->rw ?? '' }}</div>
        <div class="mb-2"><strong>Desa:</strong> {{ $model->biodata->village ?? '' }}</div>
        <div class="mb-2"><strong>Kecamatan:</strong> {{ $model->biodata->district->name ?? '' }}</div>
        <div class="mb-2"><strong>Kabupaten:</strong> {{ $model->biodata->regency->name ?? '' }}</div>
        <div class="mb-2"><strong>Provinsi:</strong> {{ $model->biodata->province->name ?? '' }}</div>
        <div class="mb-2"><strong>Tinggi Badan:</strong> {{ $model->biodata->height ?? '' }}</div>
        <div class="mb-2"><strong>Berat badan:</strong> {{ $model->biodata->weight ?? '' }}</div>
      </div>
      <div class="col">
        @isset($model->biodata->vision)
          <div class="mb-2"><strong>penglihatan:</strong> {{ $model->biodata->vision ? 'normal' : 'tidak normal' }}</div>
          <div class="mb-2"><strong>minus:</strong> {{ $model->biodata->minus ?? '-' }}</div>
        @endisset
        @isset($model->biodata->hearing)
          <div class="mb-2"><strong>Pendengaran:</strong> {{ $model->biodata->hearing ? 'normal' : 'tidak normal' }}</div>
        @endisset
        <div class="mb-2"><strong>Penyakit Sedang Diderita:</strong> {{ $model->biodata->disease_present ?? '' }}</div>
        <div class="mb-2"><strong>Penyakit Pernah Diderita:</strong> {{ $model->biodata->disease_once ?? '' }}</div>
        <div class="mb-2"><strong>Asal Sekolah:</strong> {{ $model->biodata->prev_school ?? '' }}</div>
        <div class="mb-2"><strong>Pindah Dari Sekolah:</strong> {{ $model->biodata->moved_school ?? '' }}</div>
        <div class="mb-2"><strong>Lama Belajar:</strong> {{ $model->biodata->learn_duration ?? '' }}</div>
        <div class="mb-2"><strong>Diterima Pada:</strong> {{ $model->biodata->accepted_at ?? '' }}</div>
        <div class="mb-2"><strong>Alasan Pindah:</strong> {{ $model->biodata->moved_reason ?? '' }}</div>
      </div>
    </div>
  </x-admin.card>
  @else
  <x-admin.card md="8" lg="8">
    <center><b>Biodata Belum Di Isi</b></center>
  </x-admin.card>
  @endif

  <div class="my-4"></div>

  @if (!empty($model->payment))
  <x-admin.card
    title="Bukti Pembayaran"
    md="8" lg="8"
  >
    <div class="row">
      <div class="col">
        <table class="table">
          <tr>
            <th>preview</th>
            <th>status</th>
          </tr>
          <tr>
          <tr>
            <td>
              <img src="{{ asset($model->payment->img) }}" width="100" alt="">
            </td>
            <td>
              @if ($model->payment->status === 0)
                <span class="badge bg-danger ">belum terkonfirmasi</span>
              @endif
              @if ($model->payment->status === 1)
                <span class="badge bg-success ">terkonfirmasi</span>
              @endif
            </td>
          </tr>
        </table>
      </div>
    </div>
  </x-admin.card>
  @else
  <x-admin.card md="8" lg="8">
    <center><b>Belum melakukan pembayaran</b></center>
  </x-admin.card>
  @endif

  <div class="my-4"></div>


  <div class="my-4"></div>
  @if (!empty($model->ortu))
  <x-admin.card
    title="Biodata Orangtua"
    md="8" lg="8"
  >
    <div><b>Ayah</b></div>
    <hr>
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Nama Ayah:</strong> {{ $model->ortu->father_name ?? '' }}</div>
        <div class="mb-2"><strong>NIK Ayah:</strong> {{ $model->ortu->father_nik ?? '' }}</div>
        <div class="mb-2"><strong>Tanggal Lahir Ayah:</strong> {{ $model->ortu->father_birth_date ?? ''}}</div>
        <div class="mb-2"><strong>Tempat Lahir Ayah:</strong> {{ $model->ortu->father_place_birth ?? '' }}</div>
      </div>
      <div class="col">
        <div class="mb-2"><strong>Profesi Ayah:</strong> {{ $model->ortu->father_profession ?? '' }}</div>
        <div class="mb-2"><strong>Pendidikan Terakhir Ayah:</strong> {{ $model->ortu->father_last_education ?? '' }}</div>
        <div class="mb-2"><strong>Pendapatan Ayah:</strong>Rp. {{ $model->ortu->father_income ?? '' }}</div>
      </div>
    </div>

    <hr>
    <div><b>Ibu</b></div>
    <hr>
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Nama Ibu:</strong> {{ $model->ortu->mother_name ?? '' }}</div>
        <div class="mb-2"><strong>NIK Ibu:</strong> {{ $model->ortu->mother_nik ?? '' }}</div>
        <div class="mb-2"><strong>Tanggal Lahir Ibu:</strong> {{ $model->ortu->mother_birth_date ?? ''}}</div>
        <div class="mb-2"><strong>Tempat Lahir Ibu:</strong> {{ $model->ortu->mother_place_birth ?? '' }}</div>
      </div>
      <div class="col">
        <div class="mb-2"><strong>Profesi Ibu:</strong> {{ $model->ortu->mother_profession ?? '' }}</div>
        <div class="mb-2"><strong>Pendidikan Terakhir Ibu:</strong> {{ $model->ortu->mother_last_education ?? '' }}</div>
        <div class="mb-2"><strong>Pendapatan Ibu:</strong>Rp. {{ $model->ortu->mother_income ?? '' }}</div>
      </div>
    </div>
  </x-admin.card>
  @else
  <x-admin.card md="8" lg="8">
    <center><b>Biodata Belum Di Isi</b></center>
  </x-admin.card>
  @endif

  <div class="my-4"></div>

  @if (!empty($model->qurbanSaving))
  <x-admin.card
    title="Akad Tabungan Hewan Qurban"
    md="8" lg="8"
  >
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Hewan Qurban :</strong> {{ $model->qurbanSaving->qurban ?? ''}}</div>
        <div class="mb-2"><strong>Tipe Hewan Qurban :</strong> {{ $model->qurbanSaving->qurban_type ?? '' }}</div>
        <div class="mb-2"><strong>Cicilan tabungan Perbulan:</strong> {{ $model->qurbanSaving->instalment ?? '' }}</div>
      </div>
    </div>
  </x-admin.card>
  @else
  <x-admin.card md="8" lg="8">
    <center><b>Formulirakad tabungan hewan qurban</b></center>
  </x-admin.card>
  @endif
@endsection