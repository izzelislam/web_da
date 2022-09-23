@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
    {{-- route="{{ $create_route ?? '#' }}"   --}}
  >

  <div class="col-auto">
    <form action="{{ route('users.index') }}">
      @csrf
      <select name="school_year" class="form-select w-auto" onchange="this.form.submit()">
        <option selected > -- pilih tahun ajaran -- </option>
          @foreach ($schoolYears as $year)
            <option {{ request('school_year') == $year->year ? "selected" : "" }} value="{{ $year->year }}">{{ $year->year }}</option>
          @endforeach
      </select>
    </form>
  </div>

    <div class="col-auto">
      <form action="{{ route('users.index') }}">
        @csrf
        <select name="unit" class="form-select w-auto" onchange="this.form.submit()">
          <option selected > -- pilih unit -- </option>
            @foreach ($units as $unit)
              <option {{ request('unit') == $unit->id ? "selected" : "" }} value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
        </select>
      </form>
    </div>
  </x-admin.page-title>

@endsection

@section('content')
  <x-admin.card>
    <livewire:user-table/>
  </x-admin.card>
  
@endsection