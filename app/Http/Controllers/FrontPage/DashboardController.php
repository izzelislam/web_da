<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['model'] = User::where('id',auth()->user()->id)->with('biodata', 'ortu', 'payment', 'qurbanSaving')->first();
        // dd($data['model']->toArray());
        return view('student.dashboard.index', $data);
    }
}
