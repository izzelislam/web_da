@extends('admin.layouts.app')

@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
  <div class="col-auto">
        <h1 class="app-page-title mb-0">Galeri</h1>
  </div>
  <div class="col-auto">
     <div class="page-utilities">
      <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
        <div class="col-auto">
          <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-file"></i>
            Upload Gambar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4">
  @foreach ($images as $image)
    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
      <div class="app-card app-card-doc shadow-sm  h-100">
        <div class="app-card-thumb-holder p-3">
          <div class="app-card-thumb">
            <img class="thumb-image" src="{{ asset($image->name) }}" alt="">
          </div>
          <a class="app-card-link-mask" href="#file-link"></a>
        </div>
        <div class="app-card-body p-3 has-card-actions">
          <div class="app-doc-meta">
            <ul class="list-unstyled mb-0">
              <li><span class="text-muted">Type:</span> Image</li>
              <li><span class="text-muted">uploaded:</span> {{ $image->created_at->diffForHumans() }}</li>
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
                <a href="{{ $image->name }}" target="blank" class="dropdown-item">
                  <i class="bi bi-eye me-2 fa fa-eye"></i>
                  View
                </a>
              </li>
              <li>
                <form action="{{ route('galery.delete', $image->id) }}" method="POST">
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
    {!! $images->links() !!}
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <x-admin.input
            type="file"
            label="Silahkan Pilih File"
            name="img"
            placeholder="silahkan pilih gambar."
          />
          <b>
            <small><i class="text-danger">* max 2 mb</i></small>
          </b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button formaction="{{ route('galery.store') }}" class="btn btn-success text-white">Upload gambar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection