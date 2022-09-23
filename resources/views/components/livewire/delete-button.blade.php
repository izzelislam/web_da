<form action="{{ $route.$id }}" class="d-inline" method="POST">
  @csrf
  @method('DELETE')
  <button class="btn btn-danger text-white">
    <i class="fa fa-trash me-2"></i>
    Hapus
  </button>
</form>