@extends('admin.layouts.app')

@section('page-title')
  <x-admin.page-title 
    title="{{ $title ?? '' }}" 
    {{-- route="{{ $create_route ?? '#' }}"   --}}
  >

  <div class="col-auto">
    {{-- <form action="{{ route('users.index') }}">
      @csrf
      <select name="school_year" class="form-select w-auto" onchange="this.form.submit()">
        <option selected > -- pilih tahun ajaran -- </option>
          @foreach ($schoolYears as $year)
            <option {{ request('school_year') == $year->year ? "selected" : "" }} value="{{ $year->year }}">{{ $year->year }}</option>
          @endforeach
      </select>
    </form>
  </div> --}}

    <div class="col-auto">
      <form action="{{ route('users.index') }}">
        @csrf
        <div class="row">
          <div class="col">
            <select name="school_year" class="form-select w-auto" onchange="this.form.submit()">
              <option selected value="" > -- pilih tahun ajaran -- </option>
                @foreach ($schoolYears as $year)
                  <option {{ request('school_year') == $year->year ? "selected" : "" }} value="{{ $year->year }}">{{ $year->year }}</option>
                @endforeach
            </select>
          </div>
          <div class="col">
            <select name="unit" class="form-select w-auto" onchange="this.form.submit()">
              <option selected value=""> -- pilih unit -- </option>
                @foreach ($units as $unit)
                  <option {{ request('unit') == $unit->id ? "selected" : "" }} value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col">
            <a class="btn bg-info text-white " href="/admin/registrant/export?{{ request()->getQueryString() }}"><i class="fa fa-file-excel"></i> Exportexcel</a>
          </div>
          <div class="col">
            <a class="btn bg-success text-white" href="{{ route('users.index') }}"><i class="fa fa-history"></i> Reset Filter</a>
          </div>
        </div>
      </form>
    </div>
  </x-admin.page-title>

@endsection

@section('content')
  <x-admin.card>
    <livewire:user-table/>
  </x-admin.card>
  
@endsection