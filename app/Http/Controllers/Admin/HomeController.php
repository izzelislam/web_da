<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Feedback;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['total_user'] = User::count();
        $data['pending_payment'] = Payment::where('status', 0)->count();
        $data['total_post'] = Article::count();
        $data['total_coments'] = Feedback::count();

        $data['latest_users'] = User::with('unit')->orderBy('created_at', 'desc')->limit(10)->get();
        $data['coments'] = Feedback::orderBy('created_at', 'desc')->limit(10)->get();
        return view('admin.dashboard.index', $data);
    }
}
