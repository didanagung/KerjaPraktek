<?php

namespace App\Http\Controllers;

use App\Surat;
use App\SuratMhs;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function jsurat()
    {
        $jsurat = Surat::paginate(7);
        return view('halamanadmin.jsurat', ['jsurat' => $jsurat]);
    }

    public function create()
    {
        return view('halamanadmin.buat');
    }

    public function halamanverifikasi()
    {
        $mahasiswa = User::paginate(2);
        return view('halamanadmin.halverifikasi', ['mahasiswa' => $mahasiswa]);
    }

    public function arsip()
    {
        $surat = SuratMhs::paginate(6);
        return view('halamanadmin.arsip', ['surat' => $surat]);
    }



    public function show($slug)
    {
        $surat = Surat::where('slug', $slug)->first();
        if ($surat == null)
            abort(404);
        return view('halamanadmin.detail', compact('surat'));
    }

    public function destroy($id)
    {
        $del = Surat::find($id);
        $hps = $del->file;
        $flhps = public_path('files/' . $hps);
        // dd($flhps);
        if (file_exists($flhps)) {
            @unlink($flhps);
        }
        $del->delete();
        return redirect('/jenis-surat')->with('success', 'Data Berhasil Dihapus!');
    }

    public function download($file)
    {
        $filedownload = public_path('file_upload_wk/' . $file);
        return response()->download($filedownload);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'mimes:doc,docx,odt|required',
            'judul' => 'required|max:25|min:5'
        ]);

        $imgName = $request->file->getClientOriginalName() . '-' . time() . '.' . $request->file->extension();
        $request->file->move(public_path('files'), $imgName);
        Surat::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'), //slug ini berguna untuk megindahkan url
            'file' => $imgName
        ]);
        return redirect('/surat')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function verifikasi($id)
    {
        $surat = SuratMhs::where('id', $id)->first();
        if ($surat == null)
            abort(404);
        return view('halamanadmin.verif', compact('surat'));
    }

    public function update(Request $request, SuratMhs $suratmhs)
    {
        // dd($request);
        $request->validate([
            'tindakan' => 'required',
        ]);

        SuratMhs::where('id', $suratmhs->id)
            ->update([
                'tindakan' => $request->tindakan,
            ]);
        return redirect('/verifikasi')->with('success', 'Surat Berhasil Diverifikasi!');
    }
}
