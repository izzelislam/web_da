@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
    route="{{ $create_route ?? '#' }}"  
  />
@endsection

@section('content')
<div class="row g-4">
  @foreach ($videos as $item)
    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
      <div class="app-card app-card-doc shadow-sm  h-100">
        <div class="app-card-thumb-holder p-3">
          <div class="app-card-thumb">
            <iframe src="{{ $item->link }}"
             width="200" height="100" frameborder="0" allowfullscreen></iframe>

            <img class="thumb-image" src="{{ asset($item->name) }}" alt="">
          </div>
          <a class="app-card-link-mask" href="#file-link"></a>
        </div>
        <div class="app-card-body p-3 has-card-actions">
          <div class="mb-2">
            <small><b>{{ \Str::limit($item->title, '20') }}</b></small>
          </div>
          <div class="app-doc-meta">
            <ul class="list-unstyled mb-0">
              <li><span class="text-muted">Type:</span> Video</li>
              <li><span class="text-muted">uploaded:</span> {{ $item->created_at->diffForHumans() }}</li>
            </ul>
          </div><!--//app-doc-meta-->
          
          <div class="app-card-actions">
            <div class="dropdown">
              <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                  </svg>
              </div><!--//dropdown-toggle-->
              <ul class="dropdown-menu">
              <li>
                <a href="{{ $item->link }}" target="blank" class="dropdown-item">
                  <i class="bi bi-eye me-2 fa fa-eye"></i>
                  View
                </a>
              </li>
              <li>
                <a href="{{ route('video.edit', $item->id) }}" class="dropdown-item">
                  <i class="bi bi-eye me-2 fa fa-edit"></i>
                  edit
                </a>
              </li>
              <li>
                <form action="{{ route('galery.delete', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="dropdown-item" >
                    <i class="bi bi-eye me-2 fa fa-trash"></i>
                    Delete
                  </button>
                </form>
              </li>
            </ul>
            </div>
            </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<nav class="app-pagination mt-5 ">
  <div class="pagination justify-content-center">
    {!! $videos->links() !!}
  </div>
</nav>  
@endsection