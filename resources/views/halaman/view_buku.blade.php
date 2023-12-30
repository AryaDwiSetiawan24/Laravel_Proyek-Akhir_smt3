@extends('layouts.app')
@section('title', 'Buku')

@section('content')
    <div class="container p-3">
        <h3>
            <center>Daftar Buku Perpustakaan Universitas Semarang</center>
        </h3>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBukuTambah">
            Tambah Data Buku
        </button>
        
        <!-- Awal Modal tambah data Buku -->
        @include('halaman/view_bukutambah')

        <p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">ID Buku</td>
                    <td align="center">Kode Buku</td>
                    <td align="center">Judul Buku</td>
                    <td align="center">Pengarang</td>
                    <td align="center">Penerbit</td>
                    <td align="center">Gambar</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($buku as $index => $bk)
                    <tr>
                        <td align="center" scope="row">{{ $index + $buku->firstItem() }}</td>
                        <td>{{ $bk->idbuku }}</td>
                        <td>{{ $bk->kodebuku }}</td>
                        <td>{{ $bk->judul }}</td>
                        <td>{{ $bk->pengarang }}</td>
                        <td>{{ $bk->penerbit }}</td>
                        <td align="center">
                            @if ($bk['foto'])
                                <a href="{{ asset('storage/' . $bk['foto']) }}"><img
                                        src="{{ asset('storage/' . $bk['foto']) }}" alt="Gambar Buku"
                                        style="width: 45px">
                                </a>
                            @else
                                No Image
                            @endif
                        </td>
                        <td align="center">

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalBukuEdit{{ $bk->idbuku }}">
                                Edit
                            </button>

                            <!-- Awal Modal EDIT data Buku -->
                            <div class="modal fade" id="modalBukuEdit{{ $bk->idbuku }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalBukuEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalBukuEditLabel">Form Edit Data Buku</h5>
                                        </div>
                                        <div class="modal-body">

                                            <form name="formbukuedit" id="formbukuedit"
                                                action="/buku/edit/{{ $bk->idbuku }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group row">
                                                    <label for="idbuku" class="col-sm-4 col-form-label">Kode Buku</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="kodebuku"
                                                            name="kodebuku" value="{{ $bk->kodebuku }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="judul"
                                                            name="judul" value="{{ $bk->judul }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="pengarang" class="col-sm-4 col-form-label">Nama
                                                        Pengarang</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="pengarang"
                                                            name="pengarang" value="{{ $bk->pengarang }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="penerbit"
                                                            name="penerbit" value="{{ $bk->penerbit }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="foto" class="col-sm-4 col-form-label">Gambar
                                                        Buku</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control-file" id="foto"
                                                            name="foto" value="{{ $bk->foto }}">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" name="tutup" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="bukutambah"
                                                        class="btn btn-success">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal EDIT data buku -->

                            <a href="buku/hapus/{{ $bk->idbuku }}" onclick="return confirm('Yakin mau dihapus?')">
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
                    <td>Halaman : {{ $buku->currentPage() }}</td>
                    <td>Jumlah Data : {{ $buku->total() }} </td>
                    <td>Data Per Halaman : {{ $buku->perPage() }} </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>{{ $buku->links() }}</td>
                </tr>
            </table>
        </center>
        <!--akhir pagination-->
    </div>
@endsection
