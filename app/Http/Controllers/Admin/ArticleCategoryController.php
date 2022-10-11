<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    private $model;

    public function __construct(ArticleCategory $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('admin.article-category.index');
    }

    public function show($id)
    {
        $data['model'] =  $this->model->find($id);
        return view('admin.article-category.detail', $data);

    }

    public function create()
    {
        $data['route'] = route('article-category.store');
        return view('admin.article-category.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'nama wajib di isi'
        ]);

        $this->model->create($request->all());

        return redirect()->route('article-category.index')->with('success', 'berhasil membuat category');
    }

    public function edit($id)
    {
        if ($id === 1){
            return redirect()->back()->with('error', 'kategori tidak bisa di update');
        }
        $data['model'] = $this->model->find($id);
        $data['route'] = route('article-category.update', $id);

        return view('admin.article-category.form', $data);
    }

    public function update(Request $request, $id)
    {
        if ($id === 1){
            return redirect()->back()->with('error', 'kategori tidak bisa di update');
        }
        $data = $this->model->find($id);
        $data->update($request->all());

        return redirect()->route('article-category.index')->with('success', 'berhasil update data');
    }

    public function destroy($id)
    {
        if ($id === 1){
            return redirect()->back()->with('error', 'kategori tidak bisa di hapus');
        }
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect()->route('article-category.index')->with('success', 'berhasil hapus data');
    }
}
