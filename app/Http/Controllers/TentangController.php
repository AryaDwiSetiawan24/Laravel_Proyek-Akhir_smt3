<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\BukuModel;

class TentangController extends Controller
{
    //method untuk tampil data buku
    public function penyimpanantampil()
    {
        $databuku = BukuModel::orderby('idbuku', 'ASC')
            ->paginate(5);

        return view('halaman/view_buku', ['buku' => $databuku]);
    }

    //method untuk tambah data buku
    public function penyimpanantambah(Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        BukuModel::create([
            'kodebuku' => $request->kodebuku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit
        ]);

        return redirect('/buku')->with('success', 'Book deleted successfully!');
    }

    //method untuk hapus data buku
    public function penyimpananhapus($idbuku)
    {
        $databuku = BukuModel::find($idbuku);
        $databuku->delete();

        return redirect()->back();
    }

    //method untuk edit data buku
    public function penyimpananedit($idbuku, Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        $idbuku = BukuModel::find($idbuku);
        $idbuku->kodebuku   = $request->kodebuku;
        $idbuku->judul      = $request->judul;
        $idbuku->pengarang  = $request->pengarang;
        $idbuku->penerbit   = $request->penerbit;

        $idbuku->save();

        return redirect()->back();
    }
}
