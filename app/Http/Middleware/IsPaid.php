<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('web')->check()){
            return abort(403);
        }

        $is_paid = Payment::where('user_id', auth()->user()->id)->first();

        if (!empty($is_paid)){
            if ($is_paid->status === 1){
                return $next($request);
            }
            return redirect()->route('payment-redirect');
        }
        return redirect()->route('payment-redirect');
    }
}
