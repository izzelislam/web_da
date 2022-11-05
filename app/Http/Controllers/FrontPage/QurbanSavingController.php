<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\QurbanSaving;
use Illuminate\Http\Request;

class QurbanSavingController extends Controller
{
    public function create()
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $data['route'] = route('qurban-saving.store');
        $model = QurbanSaving::where('user_id', auth()->user()->id)->first();

        if (!empty($model)){
            $data['model'] = $model;
            $data['route'] = route('qurban-saving.update');
        }
        
        return view('student.qurban-saving.form', $data);
    }

    public function store(Request $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $request->validate([
            'is_accept' => 'required',
            'qurban' => 'required',
            'qurban_type' => 'required',
        ], [
            'is_accept.required' => 'wajib di isi',
            'qurban.required' => 'wajib di isi',
            'qurban_type.required' => 'wajib di isi',
        ]);

        $request['user_id'] = auth()->user()->id;
        
        if ($request->month_12){
            $request['instalment'] = "Cicilan 12 Bulan Tipe ".$request->month_12; 
        }
        if ($request->month_24){
            $request['instalment'] = "Cicilan 24 Bulan Tipe ".$request->month_24; 
        }

        if ($request->month_36){
            $request['instalment'] = "Cicilan 36 Bulan Tipe ".$request->month_36; 
        }

        QurbanSaving::create($request->all());
        
        return redirect()->back()->with('success', 'berhasil menambahkan data');
    }

    public function update(Request $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $request->validate([
            'is_accept' => 'required',
            'qurban' => 'required',
            'qurban_type' => 'required',
        ], [
            'is_accept.required' => 'wajib di isi',
            'qurban.required' => 'wajib di isi',
            'qurban_type.required' => 'wajib di isi',
        ]);

        $request['user_id'] = auth()->user()->id;
        
        if ($request->month_12){
            $request['instalment'] = "Cicilan 12 Bulan Tipe ".$request->month_12; 
        }
        if ($request->month_24){
            $request['instalment'] = "Cicilan 24 Bulan Tipe ".$request->month_24; 
        }

        if ($request->month_36){
            $request['instalment'] = "Cicilan 36 Bulan Tipe ".$request->month_36; 
        }

        $model = QurbanSaving::where('user_id', auth()->user()->id)->first();
        $model->update($request->all());    

        return redirect()->back()->with('success', 'berhasil update biodata');
    }
}
