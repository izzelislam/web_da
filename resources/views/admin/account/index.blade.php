@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
  />
@endsection

@section('content')
  <x-admin.card>
    <livewire:account-table/>
  </x-admin.card>
  
@endsection