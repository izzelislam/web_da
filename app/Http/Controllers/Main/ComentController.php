<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Feedback;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function store(Request $request ,$id)
    {
        $request->validate([
            'username' => 'required',
            'coment'  => 'required'
        ]);

        $article = Article::findOrFail($id);
        if ($article){
            Feedback::create([
                'article_id' => $article->id,
                'username'  => request('username'),
                'coment'    => request('coment')
            ]);
        }

        return redirect()->back();
    }
    
}
