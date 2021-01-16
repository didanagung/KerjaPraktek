<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMhs;
use App\Surat;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $srt = Surat::paginate(8);
        return view('halamanutama.beranda', ['surat' => $srt]);
    }

    public function show($slug)
    {
        $surat = Surat::where('slug', $slug)->first();
        if ($surat == null)
            abort(404);
        return view('halamanutama.detail', compact('surat'));
    }

    public function download($file)
    {
        $filedownload = public_path('files/' . $file);
        return response()->download($filedownload);
    }

    public function upload()
    {
        return view('halamanutama.upload');
    }

    public function storesrt(Request $request)
    {
        $Iduser = auth()->id();
        // dd($Iduser);
        $request->validate([
            'file_upload' => 'mimes:doc,docx,odt|required',
        ]);

        $imgName = $request->file_upload->getClientOriginalName() . '-' . time() . '.' . $request->file_upload->extension();
        $request->file_upload->move(public_path('file_upload'), $imgName);

        SuratMhs::create([
            'file_upload' => $imgName,
            'user_id' => $Iduser,
        ]);
        return redirect('/surat')->with('success', 'Surat Berhasil Diupload!');
    }

    public function downloadsrt()
    {

        $surat = User::all();
        return view('halamanutama.haldownload', ['surat' => $surat]);
    }

    public function unduh($file)
    {
        $filedownload = public_path('file_upload_wk/' . $file);
        return response()->download($filedownload);
    }
}
