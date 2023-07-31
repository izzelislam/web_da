<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocRequest;
use App\Models\Doc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DocController extends Controller
{
    public function create()
    {
        $ticket = request()->ticket;
        if (empty($ticket)){
            return redirect()->back()->with('error', 'url salah');
        }
        $user = User::where('nik', Crypt::decryptString($ticket))->first();
        if (empty($user) ){
            return redirect()->back()->with('error', 'url salah');
        }
        
        $data['route'] = route('student-docs.store', $ticket);
        $data['model'] = Doc::where('user_id', $user->id)->first();
        return view('student.doc.form', $data);
    }

    public function store(DocRequest $request)
    {
        
        $doc = Doc::where('user_id', auth()->guard('web')->user()->id)->first();

        

        if (empty($doc)){
            Doc::create([
                'user_id' => auth()->guard('web')->user()->id,
                'ijazah' => $this->uploadFile($request->file('ijazah')),
                'akta' => $this->uploadFile($request->file('akta')),
                'family_card' => $this->uploadFile($request->file('family_card')),
            ]);
        }

        if (!empty($doc)){
            $data['ijazah'] = $this->uploadFile($request->file('ijazah'));
            $data['akta'] = $this->uploadFile($request->file('akta'));
            $data['family_card'] = $this->uploadFile($request->file('family_card'));

            $this->deleteFile($doc->ijazah);
            $this->deleteFile($doc->akta);
            $this->deleteFile($doc->family_card);

            $doc->update($data);
        }

        return redirect()->back()->with('success', 'berhasil upload dokumen');
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
        $file->move('docs', $fileName);
        return 'docs/'. $fileName;
    }
}
