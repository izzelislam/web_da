@extends('student.layouts.app')

@section('content')
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
  <div class="inner">
    <div class="app-card-body p-3 p-lg-4">
      <h3 class="mb-3">Selamat Datang, {{ auth()->user()->name }}!</h3>
      <div class="row gx-5 gy-3">
          <div class="col-12 col-lg-9">
            <div>Silahkan lengkapi data diri dan dokumen yang di butuhkan .</div>
        </div><!--//col-->
      </div><!--//row-->
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div><!--//app-card-body-->
    
  </div><!--//inner-->
</div>


<div class="app-card shadow-sm mb-4 border-left-decoration">
  <div class="inner">
    <div class="app-card-body p-3 p-lg-4">
      <div class="row">
        <div class="col-12 col-md-2 col-lg-2">
          <img class="rounded" width="100px" src="{{ asset(auth()->user()->image) }}" alt="">
          <div>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary text-white mt-2">Ubah Foto</button>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div><strong>Nama :</strong>{{ auth()->user()->name }}</div>
          <div><strong>NIK :</strong>{{ auth()->user()->nik }}</div>
          <div><strong>Jenis Kelamin :</strong>{{ auth()->user()->gender }}</div>
          <div><strong>Email :</strong>{{ auth()->user()->email }}</div>
          <div><strong>No Hp :</strong>{{ auth()->user()->phone_number }}</div>
          <div><strong>Kode Pendaftaran :</strong>{{ auth()->user()->code }}</div>
          <div><strong>Pembuatan Akun :</strong>{{ auth()->user()->created_at}}</div>
          <div class="mt-2">
            <i class="text-primary">*Untuk merubah profile anda silahkan ke menu Profile atau klik link berikut !</i>
            <i><b><a href="{{ route('student-profile.edit') }}">Ubah Profile</a></b></i>
          </div>
        </div>
      </div>
    </div><!--//app-card-body-->
  </div><!--//inner-->
</div>

<div class="row g-4 mb-4">

  <div class="col-12 col-lg-3">
    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
      <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
              <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </div><!--//icon-holder-->
                  
            </div><!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Pembayaran</h4>
            </div><!--//col-->
          </div><!--//row-->
      </div><!--//app-card-header-->
      <div class="app-card-body px-4">
        
        <div class="intro">
          Status : 
          @if (empty($model->payment))
            <span class="badge bg-danger">Belum Lunas</span>
          @endif
          @isset($model->payment)
            @if (!empty($model->payment->status === 0))
              <span class="badge bg-warning">Menunggu konfirmasi</span>
            @endif
            @if (!empty($model->payment->status === 1))
              <span class="badge bg-success">Lunas</span>
            @endif
          @endisset
        </div>
      </div><!--//app-card-body-->
      <div class="app-card-footer p-4 mt-auto">
        @if (empty($model->payment))
          <a class="btn app-btn-secondary" href="{{ route("student-biodata.create") }}">Upload Bukti Pembauaran</a>
        @endif
        @if (!empty($model->payment) && $model->payment->status === 0)
          <a target="blank" href="https://api.whatsapp.com/send/?phone={{ settingData()->wa_1 }}&text=Saya+{{ Auth::user()->name }}+inggin+konfirmasi+biaya+pendaftaran+link+bukti+&app_absent=0" class="btn app-btn-secondary" >konfirmasi pembayaran</a>
        @endif
      </div><!--//app-card-footer-->
    </div><!--//app-card-->
  </div>

  <div class="col-12 col-lg-3">
    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
      <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
              <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </div><!--//icon-holder-->
                  
            </div><!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Biodata</h4>
            </div><!--//col-->
          </div><!--//row-->
      </div><!--//app-card-header-->
      <div class="app-card-body px-4">
        
        <div class="intro">
          Status : 
          @if (empty($model->biodata))
            <span class="badge bg-danger">Belum Lengkap</span>
          @endif
          @if (!empty($model->biodata))
            <span class="badge bg-success">Lengkap</span>
          @endif
        </div>
      </div><!--//app-card-body-->
      <div class="app-card-footer p-4 mt-auto">
        @if (empty($model->biodata))
          <a class="btn app-btn-secondary" href="{{ route("student-biodata.create") }}">Isi Biodata</a>
        @endif
        @if (!empty($model->biodata))
          <a class="btn app-btn-secondary" href="{{ route("student-biodata.create") }}">Edit Biodata</a>
        @endif
      </div><!--//app-card-footer-->
    </div><!--//app-card-->
  </div>

  <div class="col-12 col-lg-3">
    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
      <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
              <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </div><!--//icon-holder-->
                  
            </div><!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Biodata Orang Tua</h4>
            </div><!--//col-->
          </div><!--//row-->
      </div><!--//app-card-header-->
      <div class="app-card-body px-4">
        
        <div class="intro">
          Status :
          @if (empty($model->father) || empty($model->mother))
            <span class="badge bg-danger">Belum Lengkap</span>
          @endif
          @if (!empty($model->father) && !empty($model->mother))
            <span class="badge bg-success">Lengkap</span>
          @endif
        </div>
      </div><!--//app-card-body-->
      <div class="app-card-footer p-4 mt-auto">
        @if (empty($model->father) || empty($model->mother))
          <a class="btn app-btn-secondary" href="{{ route('student-parent.create') }}">Isi Data Ortu</a>
        @endif
        @if (!empty($model->father) && !empty($model->mother))
          <a class="btn app-btn-secondary" href="{{ route('student-parent.create') }}">Edit Data Ortu</a>
        @endif
      </div><!--//app-card-footer-->
    </div><!--//app-card-->
  </div>

  <div class="col-12 col-lg-3">
    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
      <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
              <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </div><!--//icon-holder-->
                  
            </div><!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Dokumen</h4>
            </div><!--//col-->
          </div><!--//row-->
      </div><!--//app-card-header-->
      <div class="app-card-body px-4">
        
        <div class="intro">
          Status : 
          @if (empty($model->doc))
            <span class="badge bg-danger">Belum Lengkap</span>
          @endif
          @if (!empty($model->doc))
            <span class="badge bg-success">Lengkap</span>
          @endif
        </div>
      </div><!--//app-card-body-->
      <div class="app-card-footer p-4 mt-auto">
        @if (empty($model->doc))
          <a class="btn app-btn-secondary" href="{{ route('student-docs.create') }}">Isi Dokumen</a>
        @endif
        @if (!empty($model->doc))
          <a class="btn app-btn-secondary" href="{{ route('student-docs.create') }}">Edit Dokumen</a>
        @endif
      </div><!--//app-card-footer-->
    </div><!--//app-card-->
  </div>

</div>
@endsection