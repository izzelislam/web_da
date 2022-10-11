@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Home" 
  />  
@endsection

@section('content')
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
  <div class="inner">
    <div class="app-card-body p-3 p-lg-4">
      <h3 class="mb-3">Selamat Datang Kembali, {{ auth()->guard('admin')->user()->name }}</h3>
      <div class="row gx-5 gy-3">
          <div class="col-12 col-lg-9">
            
            {{-- <div>selamt datang kembali dan selamat berakti</div> --}}
        </div><!--//col-->
      </div><!--//row-->
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div><!--//app-card-body-->
    
  </div><!--//inner-->
</div><!--//app-card-->
  
<div class="row g-4 mb-4">
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Jumlah Pendaftar</h4>
        <div class="stats-figure">{{ $total_user }}</div>
        Orang
      </div><!--//app-card-body-->
      <a class="app-card-link-mask" href="#"></a>
    </div><!--//app-card-->
  </div><!--//col-->
  
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Pembayaran Belum Terkonfirmasi</h4>
        <div class="stats-figure">{{ $pending_payment }}</div>
      </div><!--//app-card-body-->
      <a class="app-card-link-mask" href="#"></a>
    </div><!--//app-card-->
  </div><!--//col-->
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Postingan</h4>
        <div class="stats-figure">{{ $total_post }}</div>
      </div><!--//app-card-body-->
    </div><!--//app-card-->
  </div><!--//col-->
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Komentar</h4>
        <div class="stats-figure">{{ $total_coments }}</div>
      </div><!--//app-card-body-->
    </div><!--//app-card-->
  </div><!--//col-->
</div><!--//row-->
<div class="row g-4 mb-4">
    
    <div class="col-12 ">
      <div class="app-card app-card-chart h-100 shadow-sm">
        <div class="app-card-header p-3">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                  <h4 class="app-card-title">Pendaftar terbaru</h4>
            </div><!--//col-->
            <div class="col-auto">
              <div class="card-header-action">
                <a href="/admin/users">Lihat Semua</a>
              </div><!--//card-header-actions-->
            </div><!--//col-->
          </div><!--//row-->
        </div><!--//app-card-header-->
        <div class="app-card-body p-3 p-lg-4">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td>Unit</td>
              <td>Email</td>
              <td>Tanggal Daftar</td>
            </tr>
            @foreach ($latest_users as $usr )
            <tr>
              <td>{{ $usr->name }}</td>
              <td>{{ $usr->unit->name }}</td>
              <td>{{ $usr->email }}</td>
              <td>{{ $usr->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        </div><!--//app-card-body-->
      </div><!--//app-card-->
    </div>
    <div class="col-12 ">
      <div class="app-card app-card-chart h-100 shadow-sm">
        <div class="app-card-header p-3">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                  <h4 class="app-card-title">Komentar terbaru</h4>
            </div><!--//col-->
            <div class="col-auto">
              <div class="card-header-action">
                <a href="/admin/users">Lihat Semua</a>
              </div><!--//card-header-actions-->
            </div><!--//col-->
          </div><!--//row-->
        </div><!--//app-card-header-->
        <div class="app-card-body p-3 p-lg-4">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td>Unit</td>
              <td>Tanggal </td>
            </tr>
            @foreach ($coments as $coment )
            <tr>
              <td>{{ $coment->username }}</td>
              <td>{{ $coment->coment }}</td>
              <td>{{ $coment->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        </div><!--//app-card-body-->
      </div><!--//app-card-->
    </div>
</div><!--//row-->
@endsection