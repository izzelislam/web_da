<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataRequest;
use App\Models\Biodata;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function create()
    {
        $data['route'] = route('student-biodata.store');
        $data['regencies'] = Regency::all();
        $data['provinces'] = Province::all();
        $data['districts'] = District::all();

        $model = Biodata::where('user_id', auth()->user()->id)->with('regency', 'district', 'province')->first();
        // dd($model->toArray());
        if ($model){
            $data['route'] = route('student-biodata.update');
            $data['model'] = $model;
        }

        return view('student.biodata.form', $data);
    }

    public function store(BiodataRequest $request)
    {
        if (!auth()->guard('web')->check()){
            return abort(403);
        }

        $validated              = $request->validated();
        $validated['user_id']   = auth()->user()->id;
        
        Biodata::create($validated);
        return redirect()->route('student-parent.create')->with('success', 'berhasil menambahkan biodata diri');
    }

    public function update(BiodataRequest $request)
    {
        if (!auth()->guard('web')->check()){
            return abort(403);
        }

        $validated = $request->validated();
        $biodata = Biodata::where('user_id', auth()->user()->id)->first();

        if ($biodata){
            $biodata->update($validated);
        }

        if (!$biodata){
            return redirect()->route('student-biodata.create')->with('error', 'biodata tidak di temnukan');
        }

        return redirect()->route('student-parent.create')->with('success', 'berhasil edit biodata diri');
    }
}
