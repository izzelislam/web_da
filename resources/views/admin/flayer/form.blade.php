@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ isset($model) ? 'Edit':'Buat' }} {{ $title }}" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}" enctype="multipart/form-data">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Title"
        name="title"
        value="{{ $model->title ?? '' }}"
      />

      <x-admin.input
        label="Gambar"
        name="image"
        type="file"
        value="{{ $model->img ?? '' }}"
      />

      <div class="mb-3 ">
        <label for="setting-input-2" class="form-label">Status</label>
        <select name="status" id="" class="form-control @error('status')
          is-invalid
        @enderror">
          <option> -- pilih status --</option>
          <option
            @if (!empty($model))
              @if ($model->status == 1)
                selected
              @endif
            @endif
            value="1">Aktif</option>
          <option
            @if (!empty($model))
              @if ($model->status == 0)
                selected
              @endif
            @endif
            value="0">Tidak Aktif</option>
        </select>
        @error('status')
          <div class="mt-1">
            <small>
              <i><b class="text-danger">{{ $message }}</b></i>
            </small>
          </div>
        @enderror
      </div>

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection