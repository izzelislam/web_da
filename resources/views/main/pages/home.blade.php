@extends('student.layouts.app')

@section('content')
	@if (!$school_year->status)
	<x-admin.card md="8" lg="8">
		<div class="m-auto">
			<h1>PENDAFTARAN TAHUN AJARAN {{ date('Y').'/'.date('Y')+1 }} BELUM DIBUKA.</h1>
			<h5><i>Tunggu informasi seleanjutnya , atau ikuti terus perkembangan di media sosial resmi kami.</i></h5>
		</div>
	</x-admin.card>
	@endif
	@if ($school_year->status)
		<x-admin.card md="8" lg="8">
			<div class="my-5 text-center">
				<h3><b>Formulir Pendaftaran</b></h3>
			</div>
			<div class="container ">
				<div>
					<form class="auth-form login-form" method="POST" action="{{ route("register.store") }}" enctype="multipart/form-data">
						@csrf    
						<div class="email mb-3">
							<label for="setting-input-2" class="form-label">Foto</label>
							<input 
								name="img" 
								type="file" 
								class="
									form-control 
									@error("img")
										is-invalid
									@enderror
								" 
							>
							<i class="text-danger">* Foto resmi</i>
							@error('img')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div>
						<div class="email mb-3">
							<label for="setting-input-2" class="form-label">Nama Panggilan</label>
							<input 
								id="name" 
								name="name"
								value="{{ $model->name ?? '' }}" 
								type="text" 
								class="
									form-control 
									@error("name")
										is-invalid
									@enderror
								" 
								placeholder="Nama" 
								required="required"
							>
							@error('name')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div> 
						<div class="email mb-3">
							<label class="setting-input-2" for="nik">NIK</label>
							<input 
								id="nik" 
								name="nik" 
								type="text"
								inputmode="numeric"
								value="{{ $model->nik ?? '' }}"
								class="form-control
								@error("nik")
									is-invalid
								@enderror
								" 
								placeholder="NIK" 
								required="required"
							>
							@error('nik')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div> 
						<div class="email mb-3">
							<label class="setting-input-2" for="phone_number">No Telepon</label>
							<input 
								id="phone_number" 
								name="phone_number" 
								type="text"
								inputmode="numeric"
								value="{{ $model->phone_number ?? '' }}"  
								class="form-control
								@error("name")
									is-invalid
								@enderror
								" 
								placeholder="No Hp" 
								required="required"
							>
							@error('phone_number')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div>     
						<div class="email mb-3">
							<label class="setting-input-2" for="signin-email">Email</label>
							<input 
								id="signin-email" 
								name="email" 
								type="email" 
								class="form-control
								@error("email")
									is-invalid
								@enderror
								" 
								value="{{ $model->email ?? '' }}"
								placeholder="Email" 
								required="required"
							>
							@error('email')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div>
			
						<div class="mb-3 ">
							<label class="setting-input-2" for="signin-email">Jenis Kelamin</label>
							<select name="gender" id="" class="form-control
							@error("gender")
								is-invalid
							@enderror
							">
							<option value="Perempuan"> Perempuan </option>
								<option >-- pilih Jenis Kelamin --</option>
								<option value="laki-laki"> Laki-Laki </option>
							</select>
							@error('gender')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div>
			
						<div class="mb-3 ">
							<label class="setting-input-2" for="signin-email">Unit Pendidikan</label>
							<select name="unit_id" id="" class="form-control
							@error("unit_id")
								is-invalid
							@enderror
							">
								<option value="">-- pilih unit --</option>
								@foreach ($units as $unit )
									<option value="{{ $unit->id }}">{{ $unit->name }}</option>
								@endforeach
							</select>
							@error('unit_id')
								<div class="mt-1">
									<small>
										<i><b class="text-danger">{{ $message }}</b></i>
									</small>
								</div>
							@enderror
						</div>
						<div class="">
							@if (!empty(request()->ticket))
								<a a href="{{ route('student-biodata.create', request()->ticket) }}" class="btn btn-info  theme-btn mx-auto">Isi Formulir Selanjutnya</a>
							@endif
							@if (empty(request()->ticket))
								<button type="submit" class="btn btn-info  theme-btn mx-auto">Isi Formulir Selanjutnya</button>
							@endif
						</div>
						{{-- @if ($school_year->status)
						@endif --}}
					</form>
				</div>
			</div>
		</x-admin.card>
	@endif
@endsection
