@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="Category" 
    route="{{ route('article-category.create') }}"  
  />
@endsection

@section('content')
  <x-admin.card>
    <livewire:article-category-table/>
  </x-admin.card>
  
@endsection