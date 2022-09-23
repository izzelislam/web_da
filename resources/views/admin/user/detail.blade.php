@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Detail {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <div class="row">
      <div class="col">
        <div class="mb-2"><strong>Nama:</strong> {{ $model->name }}</div>
        <div class="mb-2"><strong>Email:</strong> {{ $model->email }}</div>
        <div class="mb-2"><strong>No Hp:</strong> {{ $model->phone_number }}</div>
        <div class="mb-2"><strong>Tanggal Daftar:</strong> {{ $model->created_at->format('d/m/Y') }}</div>
        <div class="mb-2"><strong>Unit:</strong> {{ $model->unit->name }}</div>
      </div>
      <div class="col">
        <img src="{{ asset($model->image) }}" alt="foto_profil" width="150px">
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
@endsection
