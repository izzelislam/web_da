<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    private $model;
    private $view;
    private $route;
    private $page_title;

    public function __construct(Article $model)
    {
        $this->model = $model;
        $this->view  = 'admin.article.';
        $this->route = 'article.';
        $this->page_title = 'Artikel';
    }

    public function index()
    {
        // $cek = auth()->guard('web')->check();
        
        // dd($cek);

        $data['title']          = $this->page_title;
        $data['create_route']   = route($this->route.'create');

        return view($this->view.'index', $data);
    }

    public function show($id)
    {
        $data['title']          = $this->page_title;
        $data['model'] =  $this->model->where('id',$id)->with('category', 'feedbacks')->first();
        return view($this->view.'detail', $data);

    }

    public function create()
    {
        $data['title'] = $this->page_title;
        $data['route'] = route($this->route.'store');
        $data['categories']     = ArticleCategory::all();
        return view($this->view.'form', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'meta'        => 'required',
            'img'         => 'required|mimes:png,jpg|dimensions:3/2|max:2000',
            'content'     => 'required',
            'short_describtion' => 'required'
        ]);

        $request['cover_image'] = $this->uploadFile($request->file('img'));
        $request['slug']        = Str::slug(request('title'));
        $request['created_by']  = auth()->guard('admin')->user()->email;
        $request['updated_by']  = auth()->guard('admin')->user()->email;

        $this->model->create($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil membuat data');
    }

    public function edit($id)
    {
        $data['title']  = $this->page_title;
        $data['model'] = $this->model->find($id);
        $data['route'] = route($this->route.'update', $id);
        $data['categories']     = ArticleCategory::all();

        return view($this->view.'form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'meta'        => 'required',
            'img'         => 'mimes:png,jpg|dimensions:3/2|max:2000',
            'content'     => 'required',
        ]);

        $data = $this->model->find($id);
        
        if (!empty($request->file('img'))){
            $this->deleteFile($data->img);
            $request['cover_image'] = $this->uploadFile($request->file('img'));
        }
        $request['updated_by']  = auth()->guard('admin')->user()->email;

        $data->update($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $this->deleteFile($data->cover_image);
        $data->delete();

        return redirect()->route($this->route.'index')->with('success', 'Berhasil hapus data');
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
        $file->move('images/article', $fileName);
        return 'images/article/'. $fileName;
    }
}
