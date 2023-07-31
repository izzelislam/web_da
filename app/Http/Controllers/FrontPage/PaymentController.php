<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Mail\PaymentMail;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $data['route'] = route('student-payment.store', $ticket);

        $model = Payment::where('user_id', $user->id)->first();
        if (!empty($model)){
            $data['model'] = $model;
        }
        return view('student.payment.form', $data);
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
        $payment = Payment::where('user_id', $user->id)->first();

        if (empty($payment)){
            $request->validate([
                'image' => 'required|mimes:png,jpg|max:2000'
            ], [
                'image.required' => 'bukti pembayaran wajib di isi',
                'image.mimes' => 'bukti pembayaran harus jpg atau png',
                'image.max' => 'bukti pembayaran makximal 2 MB',
            ]);
        }
        
        if (!empty($payment)){
            $request->validate([
                'image' => 'nullable|mimes:png,jpg|max:2000'
            ], [
                'image.required' => 'bukti pembayaran wajib di isi',
                'image.mimes' => 'bukti pembayaran harus jpg atau png',
                'image.max' => 'bukti pembayaran makximal 2 MB',
            ]);
        }        
        
        
       if (!empty($request->file('image'))){
            if (!empty($payment) && $payment->status === 1){
                return redirect()->back()->with('error', 'pembayaran sudah terkonfirmasi');
            }

            if (!empty($payment) && $payment->status === 0){
                $this->deleteFile($payment->img);
                $request['img']     = $this->uploadFile($request->file('image'));
                $payment->update($request->all());
                return redirect()->route('student-profile.index', $ticket)->with('success', 'berhasil di perbarui');
            }
            
            
            $request['img']     = $this->uploadFile($request->file('image'));
            $request['status']  = 0;
            $request['user_id'] = $user->id;

            
            Payment::create($request->all());
        }

        // $admins = Admin::all();

        // foreach ($admins as $admin) {
        //     Mail::to($admin->email)->send(new PaymentMail);
        // }

        return redirect()->route('student-profile.index', $ticket)->with('success', 'berhasil mengungah bukti pembayaran');
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
