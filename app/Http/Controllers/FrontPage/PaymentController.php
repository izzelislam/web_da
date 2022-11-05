<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Mail\PaymentMail;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $data['route'] = route('payment.store');

        $model = Payment::where('user_id', auth()->user()->id)->first();
        if (!empty($model)){
            $data['model'] = $model;
        }
        return view('student.payment.form', $data);
    }

    public function store(PaymentRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}
        
        $payment = Payment::where('user_id', auth()->guard('web')->user()->id)->first();
        
        if (!empty($payment) && $payment->status === 1){
            return redirect()->back()->with('error', 'pembayaran sudah terkonfirmasi');
        }

        if (!empty($payment) && $payment->status === 0){
            $this->deleteFile($payment->img);
            $request['img']     = $this->uploadFile($request->file('image'));
            $payment->update($request->all());
            return redirect()->back()->with('error', 'berhasil di perbarui');
        }
        
        $request['img']     = $this->uploadFile($request->file('image'));
        $request['status']  = 0;
        $request['user_id'] = auth()->guard('web')->user()->id;


        Payment::create($request->all());


        $admins = Admin::all();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new PaymentMail);
        }

        return redirect()->route('payment-redirect')->with('success', 'berhasil mengungah bukti pembayaran');
    }

    public function update(Request $request)
    {
        # code...
    }

    public function isPaid()
    {
        $data['model'] = Payment::where('user_id', auth()->guard('web')->user()->id)->first(); 
        return view('student.payment.is-paid', $data);
    }

    public function deleteFile($path)
    {
        if (file_exists($path)){
            unlink($path);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time().bin2hex(random_bytes(5)). '.' . $file->getClientOriginalExtension();
        $file->move('images/payments', $fileName);
        return 'images/payments/'. $fileName;
    }
}
