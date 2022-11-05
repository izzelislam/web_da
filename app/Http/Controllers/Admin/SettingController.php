<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['route'] = route('setting.store');
        $data['model'] = Setting::first();
        return view('admin.setting.index', $data);
    }

    public function store(Request $request)
    {
        $setting = Setting::first();

        $fields = [
            'wa_1' => 'required',
            'youtube' => 'required|url',
            
        ];

        if ($request->filled('photo')){
            $fields['photo'] = 'required|image|mimes:jpg,png';
            // dd('ada');
        }

        $request->validate($fields);
        
        if (!empty($request->filled('photo'))) {
            // check existing image
            if (isset($setting->image)) {
                // delete existing image
                $this->deleteFile($setting->logo);

                $request['logo'] = $this->uploadFile($request->file('photo'));
            }else{
                $request['logo'] = $this->uploadFile($request->file('photo'));
            }
        }else{
            $request['logo'] = $setting->logo ?? '';
        }

        // check if setting exist

        if ($setting) {
            $setting->update($request->all());
        } else {
            Setting::create($request->all());
        }
        
        
        return redirect()->route('setting.index')->with('success', 'Berhasil menyimpan pengaturan');
    }

    public function deleteFile($name)
    {
        if (file_exists($name)){
            unlink($name);
        }
    }

    public function uploadFile($file)
    {
        $newName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('images/setting/', $newName);
        return 'images/setting/'.$newName;
    }
}
