<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_peminjaman';
    protected $fillable = ['idpinjam', 'idpetugas', 'idsiswa', 'idbuku'];

    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'idpetugas');
    }

    //relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo('App\Models\SiswaModel', 'idsiswa');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'idbuku');
    }
}
