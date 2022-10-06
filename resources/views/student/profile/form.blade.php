@extends('student.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Profile" 
    previous="{{ true }}"  
  />
@endsection

@section('content')
  <x-admin.card t md="8" lg="8">
    <form class="settings-form" method="POST" action="{{ $route }}">
      @csrf
      @isset($model)
        @method('PUT')
      @endisset

      <x-admin.input
        label="Nama"
        name="name"
        value="{{ $model->name ?? '' }}"
      />


      <x-admin.input
        label="Email"
        name="email"
        type="email"
        value="{{ $model->email ?? '' }}"
      />

      <x-admin.input
        label="No Telepon"
        name="phone_number"
        value="{{ $model->phone_number ?? '' }}"
      />

      <x-admin.input
        label="Password"
        name="password"
        type="password"
        value="{{ $model->profession ?? '' }}"
      />

      <button type="submit" class="btn app-btn-primary" >Save Changes</button>
    </form>
  </x-admin.card>
@endsection