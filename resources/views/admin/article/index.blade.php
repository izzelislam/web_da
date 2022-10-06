@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
    route="{{ $create_route ?? '#' }}"  
  />
@endsection

@section('content')
  <x-admin.card>
    <livewire:article-table/>
  </x-admin.card>
  
@endsection