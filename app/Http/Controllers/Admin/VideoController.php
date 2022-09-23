<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    private $model;
    private $view;
    private $route;
    private $page_title;

    public function __construct(Video $model)
    {
        $this->model = $model;
        $this->view  = 'admin.video.';
        $this->route = 'video.';
        $this->page_title = 'Video';
    }

    public function index()
    {
        $data['title']          = $this->page_title;
        $data['create_route']   = route($this->route.'create');
        $data['videos']         = $this->model->paginate(18);
        return view($this->view.'index', $data);
    }

    public function show($id)
    {
        $data['title']          = $this->page_title;
        $data['model'] =  $this->model->find($id);
        return view($this->view.'detail', $data);

    }

    public function create()
    {
        $data['title'] = $this->page_title;
        $data['route'] = route($this->route.'store');
        return view($this->view.'form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);

        $this->model->create($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil membuat data');
    }

    public function edit($id)
    {
        $data['title']  = $this->page_title;
        $data['model'] = $this->model->find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);
        
        $data = $this->model->find($id);
        $data->update($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect()->route($this->route.'index')->with('success', 'Berhasil hapus data');
    }
}
