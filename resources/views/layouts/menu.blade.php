<li class="nav-item has-treeview">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<!-- Awal Menu PEMINJAMAN-->
<li class="nav-item has-treeview">
    <a href="{{ route('pinjam') }}" class="nav-link {{ Request::is('pinjam') ? 'active' : '' }}">
        <i class="nav-icon fas fa-random"></i>
        <p>
            Peminjaman
        </p>
    </a>
</li>
<!-- Akhir Menu PEMINJAMAN-->

<!-- Awal Menu PENGEMBALIAN-->
{{-- <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-check"></i>
        <p>
            Pengembalian
        </p>
    </a>
</li> --}}
<!-- Akhir Menu PENGEMBALIAN-->

<!-- Awal Menu BUKU-->
<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('buku') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Buku
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalBukuTambah">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Buku</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('buku') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Buku</p>
            </a>
        </li>
    </ul>
</li>
<!-- Akhir Menu BUKU-->

<!-- Awal Menu ANGGOTA-->
<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('siswa','petugas') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Anggota
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('petugas') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Petugas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('siswa') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
            </a>
        </li>
    </ul>
</li>
<!-- Akhir Menu BUKU-->

<!-- Awal Menu RAK-->
<li class="nav-item has-treeview">
    <a href="/resources/views/halaman/view_tentang.blade.php" class="nav-link {{ Request::is('/resources/views/halaman/view_tentang.blade.php') ? 'active' : '' }}">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>
            Tentang Perpus
        </p>
    </a>
</li>
<!-- Akhir Menu RAK-->
