<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $model;
    private $view;
    private $route;
    private $page_title;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->view  = 'admin.user.';
        $this->route = 'users.';
        $this->page_title = 'Pendaftar';
    }

    public function index()
    {
        $data['title']          = $this->page_title;
        $data['create_route']   = route($this->route.'create');
        $data['schoolYears']    = DB::table('school_years')->select('year')->distinct()->get();
        $data['units']          = Unit::all();
        
        return view($this->view.'index', $data);
    }

    public function show($id)
    {
        $data['title']          = $this->page_title;
        $data['model'] =  $this->model->where('id', $id)->with('biodata', 'father', 'mother', 'doc', 'unit', 'schoolYear')->first();

        // dd($data['model']->toArray());

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
            'name' => 'required'
        ], [
            'name.required' => 'nama wajib di isi'
        ]);

        $this->model->create($request->all());

        return redirect()->route($this->route.'index')->with('success', 'Berhasil membuat data');
    }

    public function edit($id)
    {
        $data['title']          = $this->page_title;
        $data['model']          = $this->model->find($id);
        $data['route']          = route($this->route.'update', $id);

        return view($this->view.'form', $data);
    }

    public function update(Request $request, $id)
    {
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
