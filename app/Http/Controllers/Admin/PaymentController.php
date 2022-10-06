<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirmStatus($id)
    {
        if (!auth()->guard('admin')->check()){return abort(403);}

        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 1]);
        return redirect()->back()->with('success', 'Pembayaran berhasil di konfirmasi');
    }

    public function cancelStatus($id)
    {
        if (!auth()->guard('admin')->check()){return abort(403);}

        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 0]);
        return redirect()->back()->with('success', 'Konfirmasi berhail di batalkan');
    }
}
