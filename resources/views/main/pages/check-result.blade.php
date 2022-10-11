@extends('main.layouts.app')

@section('content')
<!-- Home -->

<div style="height: 180px; background-color:rgb(235, 235, 235);">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="/">Home</a></li>
              <li>Pendaftar</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>			
</div>
<div class="courses">
  <div class="container">
    @include('main.layouts.alert')
    <div class="mb-4">
      <div class="row">
        <div class="col-lg-5 col m-auto">
          <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn bg-dark text-white"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card">
            <div class="card-body">
              <h4>Cek Pendaftaran</h4>
              <div class="my-2">
                <div><strong class="text-dark">Nama</strong>: {{ $user->name }}</div>
                <div><strong class="text-dark">Kode Pendaftaran</strong> : {{ $user->code }} </div>
                <div><strong class="text-dark">Tanggal Pendaftaran</strong> : {{ $user->created_at->format('d/m/Y') }} </div>
              </div>
              <div>
                <p><i>Progres Pendaftaran</i></p>
                <div>
                  <table class="table table-bordered my-3">
                    <tr>
                      <td>Pembayaran</td>
                      <td>
                        @if (!empty($user->payment))
                          @if ($user->payment->status === 1)
                            <span class="badge badge-success">lunas</span>
                          @endif
                          @if ($user->payment->status === 0)
                            <span class="badge badge-success">menunggu konfirmasi</span>
                          @endif
                        @endif
                        @if (empty($user->payment))
                          <span class="badge badge-danger">Belum lunas</span>
                          <a href="{{ route('payment.index') }}"><i class="fa fa-file"></i>bayar</a>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Biodata</td>
                      <td>
                        @if (empty($user->biodata))
                          <span class="badge badge-danger">belum lengkap</span>
                          <a href="{{ route('student-biodata.create') }}"><i class="fa fa-file"></i>lengkapi</a>
                        @endif
                        @if (!empty($user->biodata))
                          <span class="badge badge-success"> lengkap</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Biodata Ortu</td>
                      <td>
                        @if (empty($user->father) || empty($user->mother))
                          <span class="badge badge-danger">belum lengkap</span>
                          <a href="{{ route('student-parent.create') }}"><i class="fa fa-file"></i>lengkapi</a>
                        @endif
                        @if (!empty($user->father) && !empty($user->mother))
                          <span class="badge badge-success"> lengkap</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Dokumen</td>
                      <td>
                        @if (empty($user->doc))
                          <span class="badge badge-danger">belum lengkap</span>
                          <a href="{{ route('student-docs.create') }}"><i class="fa fa-file"></i>lengkapi</a>
                        @endif
                        @if (!empty($user->doc))
                          <span class="badge badge-success"> lengkap</span>
                        @endif
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('course-css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single_responsive.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses_responsive.css') }}">
  {{-- <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
    /> --}}
@endpush

@push('addon-script')
  <script src="{{ asset('js/blog_single.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.datatable').DataTable();
    });
  </script> --}}
@endpush