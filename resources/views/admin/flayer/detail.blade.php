@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Detail {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <div class="mb-2"><strong>Title:</strong> {{ $model->title }}</div>
    <div class="mb-2">
      <img class="img-fluid" width="200" src="{{ asset($model->img) }}" alt="">
    </div>
    <div class="mb-2"><strong>Status:</strong>
      @if ($model->status)
        <span class="badge bg-success">Active</span>
      @else
        <span class="badge bg-danger">In Active</span>
      @endif
    </div>
    <div class="mb-2"><strong>updated_at at:</strong> {{ $model->updated_at->format('d/m/Y H:i') }}</div>
    <div class="mb-2"><strong>created_at:</strong> {{ $model->created_at->format('d/m/Y H:i') }}</div>
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
