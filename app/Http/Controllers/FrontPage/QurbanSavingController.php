<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\QurbanSaving;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QurbanSavingController extends Controller
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

        $data['route'] = route('student-qurban-saving.store', $ticket);
        $model = QurbanSaving::where('user_id', $user->id)->first();

        if (!empty($model)){
            $data['model'] = $model;
            $data['route'] = route('student-qurban-saving.update',$ticket);
        }
        
        return view('student.qurban-saving.form', $data);
    }

    public function store(Request $request)
    {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $request->validate([
            'is_accept' => 'required',
            'qurban' => 'required',
            'qurban_type' => 'required',
        ], [
            'is_accept.required' => 'wajib di isi',
            'qurban.required' => 'wajib di isi',
            'qurban_type.required' => 'wajib di isi',
        ]);

        $request['user_id'] = $user->id;
        
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
        
        return redirect()->route('student-payment.index', $ticket)->with('success', 'berhasil menambahkan data');
    }

    public function update(Request $request)
    {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }


        $request->validate([
            'is_accept' => 'required',
            'qurban' => 'required',
            'qurban_type' => 'required',
        ], [
            'is_accept.required' => 'wajib di isi',
            'qurban.required' => 'wajib di isi',
            'qurban_type.required' => 'wajib di isi',
        ]);

        $request['user_id'] = $user->id;
        
        if ($request->month_12){
            $request['instalment'] = "Cicilan 12 Bulan Tipe ".$request->month_12; 
        }
        if ($request->month_24){
            $request['instalment'] = "Cicilan 24 Bulan Tipe ".$request->month_24; 
        }

        if ($request->month_36){
            $request['instalment'] = "Cicilan 36 Bulan Tipe ".$request->month_36; 
        }

        $model = QurbanSaving::where('user_id', $user->id)->first();
        $model->update($request->all());    

        return redirect()->route('student-payment.index', $ticket)->with('success', 'berhasil update biodata');
    }
}
