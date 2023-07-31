<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FatherRequest;
use App\Http\Requests\MotherRequest;
use App\Http\Requests\ParentRequest;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Ortu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ParentController extends Controller
{
    public function create()
    {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $data['parent_route'] = route('student-parent.store', $ticket);
        

        $model = Ortu::where('user_id', $user->id)->first();
        
        if (!empty($model)){
            $data['model']  = $model;
            $data['parent_route'] = route('student-parent.update', $ticket);
        }

        return view('student.parent.form', $data);
    }

    public function store(ParentRequest $request)
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
        $validated['user_id'] = $user->id;
        Ortu::create($validated);

        return redirect()->route('student-qurban-saving.create', $ticket)->with('success', 'berhasil menyimpan data orangtua ');
    }

    public function update(ParentRequest $request)
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

        $parent = Ortu::where('user_id', $user->id)->first();
        if (!$parent){return abort(404);}

        $parent->update($validated);
        return redirect()->route('student-qurban-saving.create', $ticket)->with('success', 'berhasil update data');
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
