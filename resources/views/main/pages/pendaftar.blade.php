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
      <div class="card">
        <div class="card-body">
          <h4>Cek Pendaftaran</h4>
          <form action="{{ route('pendaftar.check') }}" method="POST">
            @csrf
            <label for="">Masukan Kode Pendaftaran !</label>
            <div class="d-flex">
              <input name="code" type="text" class="form-control" required>
              <button  class="btn background-dark text-white">cek Status Pendaftaran</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @forelse ($pendaftars as $index => $pendaftar )
      <div class="card my-4">
        <div class="card-header">
          <h5>Tahun Ajaran : {{ $pendaftar->year }}</h5>
        </div>
        <div class="card-body">
          <table
            id="datatable{{ $index }}"
            class="table datatable"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Asal Sekolah</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pendaftar->users as $user )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->biodata->fullname ?? '' }}</td>
                  <td>{{ $user->unit->name ?? '' }}</td>
                  <td>{{ $user->biodata->prev_school ?? '' }}</td>
                  <td>{{ $user->biodata->district ?? '' }}</td>
                  <td>{{ $user->biodata->regency ?? '' }}</td>
                  <td>{{ $user->biodata->province ?? '' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @empty
        <div class="text-center">
          <h5>belum ada data pendaftar yang di tampilkan :)</h5>
        </div>
    @endforelse
  </div>
</div>
@endsection

@push('course-css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single_responsive.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses_responsive.css') }}">
  <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
    />
@endpush

@push('addon-script')
  <script src="{{ asset('js/blog_single.js') }}"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.datatable').DataTable();
    });
  </script>
@endpush