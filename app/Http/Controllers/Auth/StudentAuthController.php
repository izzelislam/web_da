<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Registrant;
use App\Models\Admin;
use App\Models\SchoolYear;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => 'logout']);
    }

    public function login()
    {
        return view('student.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required',
        ],[
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
            'email.email'    => 'Email tidak valid',
            'email.exists'   => 'Email tidak trerdaftar',
        ]);

        $credentials    = $request->only('email', 'password');
        $authenticated = auth()->attempt($credentials, $request->has('is_remember'));

        if($authenticated){
            return redirect()->intended('/student/dashboard');
        }

        return redirect()->back()->with('error', 'Login gagal, email atau password salah');
    }

    public function register()
    {
        $data['units']          = Unit::all();
        $data['school_year']    = SchoolYear::orderBy('year', 'desc')->first();

        // dd($data['school_year']->toArray());

        return view('student.auth.register', $data);
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'unit_id'       => 'required|exists:units,id',
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'phone_number'  => 'required|unique:users,phone_number',
            'password'      => 'required|min:6|max:12',
            'gender'        => 'required',
            'nik'        => 'required|unique:users,nik'
        ],[
            'gender.required'       => "jenis kelamin wajib di isi",
            'unit_id.required'      => "wajib memilih unit",
            'unit_id.exists'        => "Unit Tidak Ditemukan",
            'name.required'         => "Nama memilih unit",
            'email.required'        => "Email memilih unit",
            'email.email'           => "Email tidak valid",
            'email.unique'          => "Email Sudah terdaftar",
            'phone_number.required' => "Nomor telepon wajib di isi",
            'nik.unique'          => "Nik Sudah terdaftar",
            'nik.required' => "Nik telepon wajib di isi",
            'phone_number.unique'   => "Nomor telepon sudah terdaftar",
            'password.required'     => "Password wajib di isi",
            'password.min'          => "Password minimal 6 karakter",
            'password.max'          => "Password maksimal 12 karakter",
        ]);

        $request['password']        = bcrypt(request('password'));
        $request['image']           = '/dumy/avatar.jpg';
        $request['code']            = CodeGenerator(16);
        
        $year = SchoolYear::orderBy('year', 'desc')->first();
        if ($year->status){
            $request['school_year_id']  = $year->id;
        }
        if (!$year->status){
            return redirect()->route('login.index')->with('error', 'Pendaftaran Belum dibukak');
        }

        User::create($request->all());

        $admins = Admin::all();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new Registrant);
        }

        return redirect()->route('login.index')->with('success', 'berhasil membuat akun, silahkan mausk mengunakan email dan password yang sudah terdaftar');
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route("login.index")->with('success', 'Berhasil keluar');
    }
}
