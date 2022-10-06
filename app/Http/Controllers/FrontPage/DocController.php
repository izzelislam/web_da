<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function create()
    {
        $data['route'] = route('student-docs.store');
        return view('student.doc.form', $data);
    }

    public function store(Request $request)
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }
}
