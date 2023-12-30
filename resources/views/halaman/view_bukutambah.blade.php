<!-- Awal Modal tambah data Buku -->
<div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBukuTambahLabel">Form Input Data Buku</h5>
            </div>
            <div class="modal-body">

                <form name="formbukutambah" id="formbukutambah" action="/buku/tambah " method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kodebuku" class="col-sm-4 col-form-label">Kode Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kodebuku" name="kodebuku"
                                placeholder="Masukan Kode Buku">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukan Judul Buku">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                placeholder="Masukan Nama Pengarang">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                placeholder="Masukan Nama Penerbit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label">Gambar Buku</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" id="foto"
                                name="foto">
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal tambah data buku -->
