<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FatherRequest;
use App\Http\Requests\MotherRequest;
use App\Http\Requests\ParentRequest;
use App\Models\Father;
use App\Models\Mother;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function create()
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $data['father_route'] = route('student-father.store');
        $data['mother_route'] = route('student-mother.store');
        
        $father_data = Father::where('user_id', auth()->user()->id)->first();
        $mother_data = Mother::where('user_id', auth()->user()->id)->first();
        
        if (!empty($father_data)){
            $data['father_model']  = $father_data;
            $data['father_route'] = route('student-father.update');
        }

        if (!empty($mother_data)){
            $data['mother_model']  = $father_data;
            $data['mother_route'] = route('student-mother.update');
        }


        return view('student.parent.form', $data);
    }

    public function fatherStore(FatherRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();
        $validated_changed_index = $this->paramFilter($validated, 'father_');
        $validated_changed_index['user_id'] = auth()->user()->id;

        Father::create($validated_changed_index);
        return redirect()->route('student-parent.create')->with('success', 'berhasil menambahkan data');
    }

    public function motherStore(MotherRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();
        $validated_changed_index = $this->paramFilter($validated, 'mother_');
        $validated_changed_index['user_id'] = auth()->user()->id;

        Mother::create($validated_changed_index);
        return redirect()->route('student-parent.create')->with('success', 'berhasil menambahkan data');
    }

    public function fatherUpdate(FatherRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();
        $validated_changed_index = $this->paramFilter($validated, 'father_');

        $father = Father::where('user_id', auth()->user()->id)->first();
        if (!$father){return abort(404);}

        $father->update($validated_changed_index);
        return redirect()->back()->with('success', 'berhasil update data');
    }
    
    public function motherUpdate(MotherRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $validated = $request->validated();
        $validated_changed_index = $this->paramFilter($validated, 'mother_');

        $mother = Mother::where('user_id', auth()->user()->id)->first();
        if (!$mother){return abort(404);}

        $mother->update($validated_changed_index);
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
