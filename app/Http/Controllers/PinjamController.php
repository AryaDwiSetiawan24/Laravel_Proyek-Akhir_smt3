<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\PetugasModel;
use App\Models\PinjamModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    //method untuk tampil data peminjaman
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('idpinjam', 'ASC')
            ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $datasiswa      = SiswaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pinjam', ['pinjam' => $datapinjam, 'petugas' => $datapetugas, 'siswa' => $datasiswa, 'buku' => $databuku]);
    }

    //method untuk tambah data peminjaman
    public function pinjamtambah(Request $request)
    {
        $this->validate($request, [
            'idpetugas' => 'required',
            'idsiswa' => 'required',
            'idbuku' => 'required'
        ]);

        PinjamModel::create([
            'idpetugas' => $request->idpetugas,
            'idsiswa' => $request->idsiswa,
            'idbuku' => $request->idbuku
        ]);
        return redirect('/pinjam');
    }

    //method untuk hapus data peminjaman
    public function pinjamhapus($idpinjam)
    {
        $datapinjam = PinjamModel::find($idpinjam);
        $datapinjam->delete();

        return redirect()->back()->with('pesan', 'Data Pinjam:' . $idpinjam . ' Berhasil dihapus');
    }

    //method untuk edit data peminjaman
    public function pinjamedit($idpinjam, Request $request)
    {
        $this->validate($request, [
            'idpetugas' => 'required',
            'idsiswa' => 'required',
            'idbuku' => 'required'
        ]);

        $idpinjam = PinjamModel::find($idpinjam);
        $idpinjam->idpetugas    = $request->idpetugas;
        $idpinjam->idsiswa      = $request->idsiswa;
        $idpinjam->idbuku       = $request->idbuku;

        $idpinjam->save();

        return redirect()->back();
    }
}
