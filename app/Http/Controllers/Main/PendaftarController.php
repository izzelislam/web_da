<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $data['pendaftars'] = SchoolYear::where('present', 1)->with(['users' => function($query){
            $query->whereHas('biodata');
        },'users.unit', 'users.biodata'])->get();

        // dd($data['pendaftars']->toArray());

        return view('main.pages.pendaftar', $data);
    }

    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $data['user'] = User::where('code', request('code'))->with([
            'schoolyear',
            'unit',
            'biodata',
            'payment',
            'father',
            'mother',
            'doc'
        ])->first();

        if (!$data['user']){
            return redirect()->back()->with('error', 'Pendaftar tidak di temukan');
        }

        return view('main.pages.check-result', $data);
    }
}
