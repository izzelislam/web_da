@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Detail {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <div class="mb-2">
      <img src="{{ asset($model->img) }}" alt="" class="img-fluid">
    </div>
    <div class="mb-2"><strong>title:</strong> {{ $model->title }}</div>
    <div class="mb-2"><strong>subtitle:</strong> {{ $model->sub_title }}</div>

    @if ($model->button_text)
      <div>
        <label for="">button</label>
        <button class="btn btn-primary">{{ $model->button_text }}</button>
      </div>
    @endif
    {{-- <div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div> --}}
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
