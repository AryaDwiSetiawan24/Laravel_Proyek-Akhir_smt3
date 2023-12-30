<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;


use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswatampil()
    {
        $datasiswa = SiswaModel::orderby('idsiswa', 'ASC')
            ->paginate(5);

        return view('halaman/view_siswa', [
            'siswa' => $datasiswa,
        ]);
    }

    //method untuk tambah mahasiswa
    public function siswatambah(Request $request)
    {
        $this->validate($request, [
            'nis'       => 'required',
            'namasiswa' => 'required',
            'kelas'     => 'required',
            'hp'        => 'required'
        ]);

        SiswaModel::create([
            'nis'       => $request->nis,
            'namasiswa' => $request->namasiswa,
            'kelas'     => $request->kelas,
            'hp'        => $request->hp
        ]);

        return redirect('/siswa');
    }

    public function siswahapus($idsiswa)
    {
        $datasiswa = SiswaModel::find($idsiswa);
        $datasiswa->delete();

        return redirect()->back();
    }

    //method untuk edit data siswa
    public function siswaedit($idsiswa, Request $request)
    {
        $this->validate($request, [
            'nis'       => 'required',
            'namasiswa' => 'required',
            'kelas'     => 'required',
            'hp'        => 'required'
        ]);

        $idsiswa = SiswaModel::find($idsiswa);
        $idsiswa->nis       = $request->nis;
        $idsiswa->namasiswa = $request->namasiswa;
        $idsiswa->kelas     = $request->kelas;
        $idsiswa->hp        = $request->hp;

        $idsiswa->save();

        return redirect()->back();
    }
}
