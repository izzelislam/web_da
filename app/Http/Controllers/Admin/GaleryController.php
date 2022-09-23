<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    private $model;

    public function __construct(Galery $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data['images'] = Galery::paginate(18);
        // dd($data['images']->toArray());
        return view('admin.galery.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('img');

        if ($image){
            Galery::create([
                'name' => $this->uploadFile($image)
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil menmbahkan data');
    }

    public function destroy($id)
    {
        $data = $this->model->findOrfail($id);

        if (file_exists($data->name)){
            unlink($data->name);
        }
        $data->delete();

        return redirect()->back()->with('success', 'berhasil hapus data');
    }

    public function uploadFile($file)
    {

        $fileName = time().bin2hex(random_bytes(5)). '.' . $file->getClientOriginalExtension();
        $file->move('images/galery', $fileName);
        return 'images/galery/'. $fileName;
    }
}
