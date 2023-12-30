<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


//panggil model BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    //method untuk tampil idbuku buku
    public function bukutampil()
    {
        $idbuku = BukuModel::orderby('idbuku', 'ASC')
            ->paginate(5);

        return view('halaman/view_buku', ['buku' => $idbuku]);
    }

    //method untuk tambah idbuku buku
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // BukuModel::create([
        //     'kodebuku' => $request->kodebuku,
        //     'judul' => $request->judul,
        //     'pengarang' => $request->pengarang,
        //     'penerbit' => $request->penerbit,
        // ]);

        $model = new BukuModel();
        $model->kodebuku = $request->kodebuku;
        $model->judul = $request->judul;
        $model->pengarang = $request->pengarang;
        $model->penerbit = $request->penerbit;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public');
            $model->foto = basename($fotoPath);
        }

        $model->created_at = now();
        $model->save();

        return redirect('/buku');
    }

    //method untuk hapus idbuku buku
    public function bukuhapus($idbuku)
    {
        $idbuku = BukuModel::find($idbuku);
        $idbuku->delete();

        return redirect()->back();
    }

    //method untuk edit idbuku buku
    public function bukuedit($idbuku, Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $idbuku = BukuModel::find($idbuku);
        $idbuku->kodebuku   = $request->kodebuku;
        $idbuku->judul      = $request->judul;
        $idbuku->pengarang  = $request->pengarang;
        $idbuku->penerbit   = $request->penerbit;

        if ($request->hasFile('foto')) {
            if ($idbuku->foto) {
                Storage::delete($idbuku->foto);
            }

            $fotoPath = $request->file('foto')->store('public');
            $idbuku->foto = basename($fotoPath);
        }

        $idbuku->save();

        return redirect()->back();
    }
}
