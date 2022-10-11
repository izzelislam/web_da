<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Video;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $data['images'] = Galery::orderBy('created_at', 'desc')->paginate(16);
        $data['videos'] = Video::orderBy('created_at', 'desc')->paginate(16);
        return view('main.pages.galery', $data);
    }
}
