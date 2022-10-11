<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocRequest;
use App\Models\Doc;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function create()
    {
        if (!auth()->guard('web')->check()){return abort(403);}
        $data['route'] = route('student-docs.store');
        $data['model'] = Doc::where('user_id', auth()->guard('web')->user()->id)->first();
        return view('student.doc.form', $data);
    }

    public function store(DocRequest $request)
    {
        // dd($request->all());
        if (!auth()->guard('web')->check()){return abort(403);}
        
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
