@extends('main.layouts.app')

@section('content')
<!-- Home -->
<div class="courses mt-4">
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
              <button  class="btn bg-primary text-white">cek Status Pendaftaran</button>
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
        <div class="card-body table-responsive">
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
                  <td>{{ $user->biodata->district->name ?? '' }}</td>
                  <td>{{ $user->biodata->regency->name ?? '' }}</td>
                  <td>{{ $user->biodata->province->name ?? '' }}</td>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.datatable').DataTable({
        responsive: true
      });
    });
  </script>
@endpush