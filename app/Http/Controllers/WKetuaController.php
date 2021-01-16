<?php

namespace App\Http\Controllers;

use App\Surat;
use App\SuratMhs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WKetuaController extends Controller
{

    public function show()
    {
        $surat = SuratMhs::all();
        return view('halamanwk.verifikasi', compact('surat'));
    }

    public function upload()
    {
        $suratd = SuratMhs::all();
        return view('halamanwk.upload', compact('suratd'));
    }

    public function download($file)
    {
        $filedownload = public_path('file_upload/' . $file);
        return response()->download($filedownload);
    }

    public function uploadsrt($id)
    {
        $surat = SuratMhs::where('id', $id)->first();
        if ($surat == null)
            abort(404);
        return view('halamanwk.uploadsrt', compact('surat'));
    }

    public function update(Request $request, SuratMhs $suratmhs)
    {
        $request->validate([
            'surat_disetujui' => 'required',
        ]);

        $imgName = $request->surat_disetujui->getClientOriginalName() . '-' . time() . '.' . $request->surat_disetujui->extension();
        $request->surat_disetujui->move(public_path('file_upload_wk'), $imgName);

        SuratMhs::where('id', $suratmhs->id)
            ->update([
                'surat_disetujui' => $imgName,
            ]);

        return redirect('/uploadsrt')->with('success', 'Surat Berhasil Diupload!');
    }
}
