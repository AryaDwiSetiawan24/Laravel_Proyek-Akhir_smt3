@extends('layouts.app')
@section('title', 'petugas')

@section('content')
    <div class="container p-3">

        <h3>
            <center>Daftar Petugas Perpustakaan USM</center>
        </h3>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpetugasTambah">
            Tambah Data petugas
        </button>

        <!-- Awal Modal tambah data Petugas -->
        <div class="modal fade" id="modalpetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalpetugasTambahLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalpetugasTambahLabel">Form Tambah Data Petugas</h5>
                    </div>
                    <div class="modal-body">

                        <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="namapetugas" class="col-sm-4 col-form-label">Nama petugas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="namapetugas" name="namapetugas"
                                        placeholder="Masukan Nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hp" class="col-sm-4 col-form-label">HP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hp" name="hp"
                                        placeholder="Masukan NO HP">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" name="tutup" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" name="petugastambah" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal tambah data buku -->

        <p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">ID Petugas</td>
                    <td align="center">Nama Petugas</td>
                    <td align="center">HP</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $index => $pt)
                    <tr>
                        <td align="center" scope="row">{{ $index + $petugas->firstItem() }}</td>
                        <td>{{ $pt->idpetugas }}</td>
                        <td>{{ $pt->namapetugas }}</td>
                        <td>{{ $pt->hp }}</td>
                        <td align="center">
                            <a type="button" href="pinjam" class="btn btn-warning"
                                onclick="return confirm('Anda akan di arahkan kedalam tabel peminjaman!')">
                                Edit
                            </a>

                            <a href="petugas/hapus/{{ $pt->idpetugas }}"
                                onclick="return confirm('Mohon periksa kembali data anda! Jika sudah tercantum ke dalam tabel peminjaman harap ubah dahulu.')">
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!--awal pagination-->

        <center>
            <table class="table table-borderless">
                <tr>
                    <td>Halaman : {{ $petugas->currentPage() }}</td>
                    <td>Jumlah Data : {{ $petugas->total() }} </td>
                    <td>Data Per Halaman : {{ $petugas->perPage() }} </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>{{ $petugas->links() }}</td>
                </tr>
            </table>
        </center>
        <!--akhir pagination-->
    </div>
@endsection
