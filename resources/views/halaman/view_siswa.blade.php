@extends('layouts.app')
@section('title', 'siswa')

@section('content')
    <div class="container p-3">

        <h3>
            <center>Daftar Mahasiswa Perpustakaan USM</center>
        </h3>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalsiswaTambah">
            Mendaftar
        </button>

        <!-- Awal Modal tambah data Mahasiswa -->
        <div class="modal fade" id="modalsiswaTambah" tabindex="-1" role="dialog" aria-labelledby="modalsiswaTambahLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalsiswaTambahLabel">Form Input Data Buku</h5>
                    </div>
                    <div class="modal-body">

                        <form name="formsiswatambah" id="formsiswatambah" action="/siswa/tambah" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="nis" class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        placeholder="Masukan NIM">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namasiswa" class="col-sm-4 col-form-label">Nama siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa"
                                        placeholder="Masukan Nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelas" class="col-sm-4 col-form-label">kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        placeholder="Masukan Kelas">
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
                                <button type="submit" name="siswatambah" class="btn btn-success">Tambah</button>
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
                    <td align="center">ID siswa</td>
                    <td align="center">NIM</td>
                    <td align="center">Nama siswa</td>
                    <td align="center">Kelas</td>
                    <td align="center">HP</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $index => $s)
                    <tr>
                        <td align="center" scope="row">{{ $index + $siswa->firstItem() }}</td>
                        <td>{{ $s->idsiswa }}</td>
                        <td>{{ $s->nis }}</td>
                        <td>{{ $s->namasiswa }}</td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->hp }}</td>
                        <td align="center">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalSiswaEdit{{ $s->idsiswa }}">
                                Edit
                            </button>

                            <!-- Awal Modal EDIT data Peminjaman -->
                            <div class="modal fade" id="modalSiswaEdit{{ $s->idsiswa }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalSiswaEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalSiswaEditLabel">Form Edit Data Siswa</h5>
                                        </div>
                                        <div class="modal-body">

                                            <form name="formsiswaedit" id="formsiswaedit"
                                                action="/siswa/edit/{{ $s->idsiswa }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group row">
                                                    <label for="idsiswa" class="col-sm-4 col-form-label">NIM</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nis"
                                                            name="nis" value="{{ $s->nis }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="namasiswa" class="col-sm-4 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="namasiswa"
                                                            name="namasiswa" value="{{ $s->namasiswa }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="kelas"
                                                            name="kelas" value="{{ $s->kelas }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="hp" class="col-sm-4 col-form-label">NO HP</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="hp"
                                                            name="hp" value="{{ $s->hp }}">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" name="tutup" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="siswatambah"
                                                        class="btn btn-success">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal EDIT data Peminjaman -->

                            <a href="siswa/hapus/{{ $s->idsiswa }}" onclick="return confirm('Yakin mau dihapus?')">
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
                    <td>Halaman : {{ $siswa->currentPage() }}</td>
                    <td>Jumlah Data : {{ $siswa->total() }} </td>
                    <td>Data Per Halaman : {{ $siswa->perPage() }} </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>{{ $siswa->links() }}</td>
                </tr>
            </table>
        </center>
        <!--akhir pagination-->
    </div>
@endsection