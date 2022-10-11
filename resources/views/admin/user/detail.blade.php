@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Detail {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card
    title="Info Pendaftar"
    md="8" lg="8"
  >
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Nama:</strong> {{ $model->name ?? '' }}</div>
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
          <div class="mb-2"><strong>Nama:</strong> {{ $model->biodata->name ?? '' }}</div>
          <div class="mb-2"><strong>Nama Lengkap: </strong> {{ $model->biodata->fullname ?? ''}}</div>
          <div class="mb-2"><strong>Tanggal Lahir:</strong> {{ $model->biodata->brth_date ?? '' }}</div>
          <div class="mb-2"><strong>Tempat Lahir:</strong> {{ $model->biodata->brth_place ?? '' }}</div>
          <div class="mb-2"><strong>Anak Ke:</strong> {{ $model->biodata->order_of_birth ?? '' }}</div>
          <div class="mb-2"><strong>Bahasa:</strong> {{ $model->biodata->language ?? '' }}</div>
          <div class="mb-2"><strong>Alamat:</strong> {{ $model->biodata->address ?? '' }}</div>
          <div class="mb-2"><strong>Rt/Rw:</strong> {{ $model->biodata->rt_rw ?? '' }}</div>
          <div class="mb-2"><strong>Desa:</strong> {{ $model->biodata->village ?? '' }}</div>
          <div class="mb-2"><strong>Kecamatan:</strong> {{ $model->biodata->district ?? '' }}</div>
          <div class="mb-2"><strong>Kabupaten:</strong> {{ $model->biodata->regency ?? '' }}</div>
          <div class="mb-2"><strong>Provinsi:</strong> {{ $model->biodata->province ?? '' }}</div>
          <div class="mb-2"><strong>Tinggi Badan:</strong> {{ $model->biodata->height ?? '' }}</div>
          <div class="mb-2"><strong>Berat badan:</strong> {{ $model->biodata->weight ?? '' }}</div>
        </div>
        <div class="col">
          @isset($model->biodata->vision)
            <div class="mb-2"><strong>penglihatan:</strong> {{ $model->biodata->vision ? 'normal' : 'tidak normal' }}</div>
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
              <th>action</th>
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
              <td>
                <form method="POST" class="d-inline">
                  @csrf @method('PUT')
                  <button formaction="{{ route('payment.confirm', $model->payment->id) }}" class="btn btn-primary text-white">
                    <i class="fa fa-money-bill me-2"></i>
                    Konfirmasi
                  </button>
                </form>
                <form method="POST" class="d-inline">
                  @csrf @method('PUT')
                  <button formaction="{{ route('payment.cancel', $model->payment->id) }}" class="btn btn-danger text-white">
                    <i class="fa fa-times me-2"></i>
                    Batalkan Konfirmasi
                  </button>
                </form>
                <a href="{{ asset($model->payment->img) }}" target="blank" class="btn btn-info text-white">
                  <i class="fa fa-eye me-2"></i>
                  lihat
                </a>
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

  @if (!empty($model->doc))
    <x-admin.card
      title="Dokumen pendaftar"
      md="8" lg="8"
    >
      <div class="row">
        <div class="col">
          <table class="table">
            <tr>
              <th>Nama Dokumen</th>
              <th>preview</th>
              <th>action</th>
            </tr>
            <tr>
              <td>Surat kelulusan</td>
              <td>
                <embed src="{{ asset($model->doc->ijazah) }}" width="150" type="">
              </td>
              <td>
                <a href="{{ route("download-doc", ['id' => $model->doc->id, 'type' => 'ijazah']) }}" class="btn btn-primary text-white">
                  <i class="fa fa-download me-2"></i>
                  Download
                </a>
                <a href="{{ asset($model->doc->ijazah) }}" target="blank" class="btn btn-info text-white">
                  <i class="fa fa-eye me-2"></i>
                  lihat
                </a>
              </td>
            </tr>
            <tr>
              <td>Kartu Keluarga</td>
              <td>
                <embed src="{{ asset($model->doc->family_card) }}" width="150" type="">
              </td>
              <td>
                <a href="{{ route("download-doc", ['id' => $model->doc->id, 'type' => 'family_card']) }}" class="btn btn-primary text-white">
                  <i class="fa fa-download me-2"></i>
                  Download
                </a>
                <a href="{{ asset($model->doc->family_card )}}" target="blank" class="btn btn-info text-white">
                  <i class="fa fa-eye me-2"></i>
                  lihat
                </a>
              </td>
            </tr>
            <tr>
              <td>Akta Kelahiran</td>
              <td>
                <embed src="{{ asset($model->doc->akta) }}" width="150" type="">
              </td>
              <td>
                <a href="{{ route("download-doc", ['id' => $model->doc->id, 'type' => 'akta']) }}" class="btn btn-primary text-white">
                  <i class="fa fa-download me-2"></i>
                  Download
                </a>
                <a href="{{ asset($model->doc->akta) }}" target="blank" class="btn btn-info text-white">
                  <i class="fa fa-eye me-2"></i>
                  lihat
                </a>
              </td>
            </tr>
            {{-- <tr>
              <td>Bukti Pembayaran</td>
              <td>
                <img src="{{ asset($model->doc->payment) }}" width="100" alt="">
              </td>
              <td>
                <a href="{{ route("download-doc", ['id' => $model->doc->id, 'type' => 'payment']) }}" class="btn btn-primary text-white">
                  <i class="fa fa-download me-2"></i>
                  Download
                </a>
                <a href="{{ $model->doc->payment }}" target="blank" class="btn btn-info text-white">
                  <i class="fa fa-eye me-2"></i>
                  lihat
                </a>
              </td>
            </tr> --}}
          </table>
        </div>
      </div>
    </x-admin.card>
  @else
    <x-admin.card md="8" lg="8">
      <center><b>Dokumen Di Isi</b></center>
    </x-admin.card>
  @endif
  

  <div class="my-4"></div>

  @if (!empty($model->father))
    <x-admin.card
      title="Data Ayah"
      md="8" lg="8"
    >
      <div class="row">
        <div class="col">
          <div class="mb-2"><strong>Nama:</strong> {{ $model->father->name ?? '' }}</div>
          <div class="mb-2"><strong>Tanggal Lahir:</strong> {{ $model->father->birth_date ?? ''}}</div>
          <div class="mb-2"><strong>Tempat Lahir:</strong> {{ $model->father->place_birth ?? '' }}</div>
        </div>
        <div class="col">
          <div class="mb-2"><strong>Profesi:</strong> {{ $model->father->profession ?? '' }}</div>
          <div class="mb-2"><strong>Pendidikan Terakhir:</strong> {{ $model->father->last_education ?? '' }}</div>
          <div class="mb-2"><strong>Pendapatan:</strong>Rp. {{ number_format($model->father->income) ?? '' }}</div>
        </div>
      </div>
    </x-admin.card>
  @else
    <x-admin.card md="8" lg="8">
      <center><b>Biodata Belum Di Isi</b></center>
    </x-admin.card>
  @endif

  <div class="my-4"></div>

  @if (!empty($model->mother))
    <x-admin.card
      title="Data Ibu"
      md="8" lg="8"
    >
      <div class="row">
        <div class="col">
          <div class="mb-2"><strong>Nama:</strong> {{ $model->mother->name ?? ''}}</div>
          <div class="mb-2"><strong>Tanggal Lahir:</strong> {{ $model->mother->birth_date ?? '' }}</div>
          <div class="mb-2"><strong>Tempat Lahir:</strong> {{ $model->mother->place_birth ?? '' }}</div>
        </div>
        <div class="col">
          <div class="mb-2"><strong>Profesi:</strong> {{ $model->mother->profession ?? '' }}</div>
          <div class="mb-2"><strong>Pendidikan Terakhir:</strong> {{ $model->mother->last_education ?? '' }}</div>
          <div class="mb-2"><strong>Pendapatan:</strong>Rp. {{ number_format($model->mother->income) ?? '' }}</div>
        </div>
      </div>
    </x-admin.card>
  @else
    <x-admin.card md="8" lg="8">
      <center><b>Biodata Belum Di Isi</b></center>
    </x-admin.card>
  @endif
@endsection
