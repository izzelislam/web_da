<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FatherRequest;
use App\Http\Requests\MotherRequest;
use App\Http\Requests\ParentRequest;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Ortu;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function create()
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $data['parent_route'] = route('student-parent.store');
        
        $model = Ortu::where('user_id', auth()->user()->id)->first();
        
        if (!empty($model)){
            $data['model']  = $model;
            // dd($model);
            $data['parent_route'] = route('student-parent.update');
        }

        return view('student.parent.form', $data);
    }

    public function store(ParentRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        Ortu::create($validated);

        return redirect()->route('qurban-saving.create')->with('success', 'berhasil menyimpan data orangtua ');
    }

    public function update(FatherRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();

        $parent = Ortu::where('user_id', auth()->user()->id)->first();
        if (!$parent){return abort(404);}

        $parent->update($validated);
        return redirect()->back()->with('success', 'berhasil update data');
    }
    
    public function paramFilter($params, $prefix, $num = 7)
    {
        $result = [];

        foreach ($params as $index => $value){
        if (str_starts_with($index, $prefix)){
            $result[substr($index, $num)] = $value;
        }
        }

        return $result;
    }
}
