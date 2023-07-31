<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataRequest;
use App\Models\Biodata;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BiodataController extends Controller
{
    public function create()
    {
        if (empty(request()->ticket)){
            return redirect()->back()->with('error', 'url salah');
        }

        $data['route'] = route('student-biodata.store', request()->ticket);
        $data['regencies'] = Regency::all();
        $data['provinces'] = Province::all();
        $data['districts'] = District::all();

        $user = User::where('nik', Crypt::decryptString(request()->ticket))->first();

        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }$user = User::where('nik', Crypt::decryptString(request()->ticket))->first();

        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $model = Biodata::where('user_id', $user->id)->with('regency', 'district', 'province')->first();
        // dd($model->toArray());
        if ($model){
            $data['route'] = route('student-biodata.update', request()->ticket);
            $data['model'] = $model;
        }

        return view('student.biodata.form', $data);
    }

    public function store(BiodataRequest $request)
    {
        if (empty(request()->ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        
        $user = User::where('nik', Crypt::decryptString(request()->ticket))->first();

        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $validated              = $request->validated();
        $validated['user_id']   = $user->id;

        if (empty($validated['nisn'])){
            $validated['nisn'] = '';
        }
        
        Biodata::create($validated);
        return redirect()->route('student-parent.create', request()->ticket)->with('success', 'berhasil menambahkan biodata diri');
    }

    public function update(BiodataRequest $request)
    {
        $ticket = request()->ticket;

        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        
        $user = User::where('nik', Crypt::decryptString($ticket))->first();

        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $validated = $request->validated();
        $biodata = Biodata::where('user_id', $user->id)->first();

        if ($biodata){
            $biodata->update($validated);
        }

        if (!$biodata){
            return redirect()->route('student-biodata.create', $ticket )->with('error', 'biodata tidak di temnukan');
        }

        return redirect()->route('student-parent.create', $ticket)->with('success', 'berhasil edit biodata diri');
    }
}
