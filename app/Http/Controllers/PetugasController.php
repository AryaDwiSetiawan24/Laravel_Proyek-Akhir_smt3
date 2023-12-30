<?php

namespace App\Http\Controllers;

use App\Models\PetugasModel;
use App\Models\PinjamModel;
use App\Models\BukuModel;
use App\Models\SiswaModel;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function petugastampil()
    {
        $datapetugas = PetugasModel::orderby('idpetugas', 'ASC')
        ->paginate(4);

        $datapinjam     = PinjamModel::all();
        $datasiswa      = SiswaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_petugas', ['pinjam' => $datapinjam, 'petugas' => $datapetugas, 'siswa' => $datasiswa, 'buku' => $databuku]);
    }

    //method untuk tambah petugas
    public function petugastambah(Request $request)
    {
        $this->validate($request, [
            'namapetugas' => 'required',
            'hp' => 'required'
        ]);

        PetugasModel::create([
            'namapetugas' => $request->namapetugas,
            'hp' => $request->hp
        ]);

        return redirect('/petugas');
    }

    public function petugashapus($idpetugas)
    {
        $datapetugas = PetugasModel::find($idpetugas);
        $datapetugas->delete();

        return redirect()->back();
    }

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
