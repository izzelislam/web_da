@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
  />
@endsection

@section('content')
  <x-admin.card>
    <livewire:article-table/>
  </x-admin.card>
  
@endsection