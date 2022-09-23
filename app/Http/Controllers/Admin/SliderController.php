<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $model;
    private $view;
    private $route;
    private $page_title;

    public function __construct(Slider $model)
    {
        $this->model = $model;
        $this->view  = 'admin.slider.';
        $this->route = 'slider.';
        $this->page_title = 'Slider';
    }

    public function index()
    {
        $data['title']          = $this->page_title;
        $data['create_route']   = route($this->route.'create');
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
            'sub_title' => 'required',
            'image'       => 'required|mimes:png,jpg|max:2500'
        ]);

        if ($request->has('image')){
            $request['img'] = $this->uploadFile($request->file('image'));
        }

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
            'sub_title' => 'required',
        ]);
        
        $data = $this->model->find($id);
        if ($request->has('image')){
            $this->deleteFile($data->img);
            $request['img'] = $this->uploadFile($request->file('image'));
        }

        $data->update($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $this->deleteFile($data->img);
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
        $file->move('images/slider', $fileName);
        return 'images/slider/'. $fileName;
    }
}
