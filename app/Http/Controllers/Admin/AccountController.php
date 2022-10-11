<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $model;
    private $view;
    private $route;
    private $page_title;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->view  = 'admin.account.';
        $this->route = 'account.';
        $this->page_title = 'Akun Pendaftar';
    }

    public function index()
    {
        $data['title']          = $this->page_title;
        // $data['create_route']   = route($this->route.'create');
        return view($this->view.'index', $data);
    }

    public function show($id)
    {
        $data['title']          = $this->page_title;
        $data['model'] =  $this->model->find($id);
        return view($this->view.'detail', $data);

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
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        
        $data = $this->model->find($id);
        if($request->has('password')){
            $request['password'] = bcrypt(request('password'));
        }
        
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
