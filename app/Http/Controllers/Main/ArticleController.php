<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Flayer;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $_article_query = Article::query();
        $_article_query->with('category');

        if (!empty(request('category_id'))){
            $_article_query->whereHas('category', function($query){
                $query->where('id', request('category_id'));
            });
        }

        if (!empty(request('q'))){
            $q = request('q');
            $_article_query->where("content","LIKE","%{$q}%")->orWhere("title","LIKE","%{$q}%");
        }
        // $_article_query->paginate(10);
        // dd($_article_query);
        
        $data['articles'] = $_article_query->orderBy('created_at', 'desc')->paginate(10);
        $data['categories'] = ArticleCategory::all();
        $data['galeries'] = Galery::limit(6)->get();
        $data['latest']   = Article::limit(4)->get();
        $data['flayers']  = Flayer::where('status', 1)->get();
        $data['categoriesLimit'] = ArticleCategory::limit(6)->orderBy('created_at', 'desc')->get();

        return view('main.pages.article', $data);
    }

    public function show($slug)
    {
        $data['model']    = Article::with('category', 'feedbacks')->where('slug', $slug)->first();
        $data['galeries'] = Galery::limit(6)->get();
        $data['latest']   = Article::limit(4)->get();
        $data['flayers']  = Flayer::where('status', 1)->get();
        $data['categoriesLimit'] = ArticleCategory::limit(6)->orderBy('created_at', 'desc')->get();
        
        return view('main.pages.article-detail', $data);
    }

    public function flayerDownload($id)
    {
        $flayer = Flayer::findOrFail($id);
        $filepath = public_path($flayer->img);
        return Response::download($filepath); 
    }
}
