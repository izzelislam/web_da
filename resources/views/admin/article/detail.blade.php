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
      <img class="img-fluid" src="{{ asset($model->cover_image) }}" alt="">
    </div>
    <div class="mb-2">
      <h5>
        {{ $model->title }}
      </h5>
    </div>
    <div class="mb-2"><strong>Ditulis Oleh:</strong> {{ $model->created_by }} {{ $model->created_at->format('d/m/Y H:i') }}</div>
    <div class="mb-2"><strong>DiUpdete Oleh:</strong> {{ $model->updated_by }} {{ $model->updated_at->format('d/m/Y H:i') }}</div>
    {{-- <div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div> --}}
    <div class="my-3">
      {!! $model->short_describtion !!}
    </div>
    <div class="my-3">
      {!! $model->content !!}
    </div>
    {{-- <div class="mb-2"><strong>created_at:</strong> {{ $model->created_at->format('d/m/Y H:i') }}</div> --}}
    {{-- <div class="row justify-content-between">
      <div class="col-auto">
          <a class="btn app-btn-primary" href="#">Upgrade Plan</a>
      </div>
      <div class="col-auto">
          <a class="btn app-btn-secondary" href="#">Cancel Plan</a>
      </div>
    </div> --}}
    <div class="my-3">
      <h5>Komentar</h6>
      <div class="mt-2">

        @foreach ($model->feedbacks as $coment )
          <div class="card mb-2">
            <div class="card-body">
              <strong>{{ $coment->username }}</strong> | <span>{{ $coment->created_at->format('d/m/Y') }}</span>
              <p>{{ $coment->coment }}</p>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </x-admin.card>
@endsection
