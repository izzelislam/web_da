<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Flayer;
use App\Models\SchoolYear;
use App\Models\Slider;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        // $data['latests'] = Article::with('category')->where('category_id', '!=', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        // $data['infos']   = Article::with('category')->where('category_id', 1)->orderBy('created_at', 'desc')->limit(3)->get();
       
        $data['content'] = Article::all();
        $data['flayers'] = Flayer::all();
        $data['units']   = Unit::all();
        $data['school_year']    = SchoolYear::orderBy('year', 'desc')->first();
        // dd($data['info']->toArray());

        if (!empty(request()->ticket)){

            $user = User::where('nik', Crypt::decryptString(request()->ticket))->first();
    // dd(Crypt::decryptString(request()->ticket));
            $data['model'] = $user;
        }

        return view('main.pages.home', $data);
    }
}
