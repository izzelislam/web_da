<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UploadPhotoRequest;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function index() {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }

        $data['model'] = USer::where('id', $user->id)->with('biodata.district', 'biodata.regency', 'biodata.province', 'ortu', 'qurbanSaving', 'unit', 'schoolYear', 'payment')->first();
        return view('student.profile.form', $data);
    }
    
    public function edit()
    {
        if (!auth()->guard('web')->check()){return abort(403);}

        $data['route'] = route('student-profile.update');
        $data['model'] = auth()->user();
        return view('student.profile.form', $data);
    }

    public function update(Request $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        $data = User::findOrFail(auth()->guard('web')->user()->id);
        if (!empty(request('password'))){
            $request['password'] = bcrypt(request('password'));
        }else{
            $request['password'] = $data->password;
        }

        $data->update($request->all());

        return redirect()->back()->with('success', 'berhasil update profil');
    }

    public function updateImageProfile(UploadPhotoRequest $request)
    {
        if (!auth()->guard('web')->check()){return abort(403);}
        
        $profile = User::where('id', auth()->user()->id)->first();

        if (dirname($profile->image) == '/dumy'){
            $request['image'] = $this->uploadFile($request->file('img'));
        }
        if (dirname($profile->image) != '/dumy'){
            $this->deleteFile($profile->image);
            $request['image'] = $this->uploadFile($request->file('img'));
        }

        $profile->update($request->all());
        return redirect()->back()->with('success', 'berhasil update foto');
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
        $file->move('images/profiles', $fileName);
        return 'images/profiles/'. $fileName;
    }
}
