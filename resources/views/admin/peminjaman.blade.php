<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Peminjaman</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Keamanan Sistem Infoasrmi</a>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h4>
            </div>
            <div class="col"></div>
            <div class="col-1">
                <a href="{{ route('logout') }}" style="text-decoration: none">
                    <p class="text-end text-black fw-semibold">Logout</p>
                </a></div>
        </div>
        <div class="row mt-3">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                            </h5>
                        </li>
                        <li class="nav-item" style="margin-left: 30px">
                            <h5>
                                <a class="nav-link" aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
                            </h5>
                        </li>
                        <li class="nav-item" style="margin-left: 30px">
                            <h5>
                                <a class="nav-link active" ariacurrent="page" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
                            </h5>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container mt-3">
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ Session::get('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.peminjaman') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari id peminjam" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col"><a class="btn btn-info text-white" target="_blank" href="{{ route('admin.cetakDataPeminjaman') }}" style="text-decoration: none; margin-right: 30px">Cetak Data</a></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('admin.tambahPeminjaman') }}" style="text-decoration: none; margin-left: 30px">Tambah Data
                    +</a>
            </div>
        </div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Anggota</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Status Peminjaman</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $peminjam)
                    <tr>
                        <td scope="row">{{ $index + $data->firstItem() }}</td>
                        <td>{{ $peminjam->id_user }}</td>
                        <td>{{ $peminjam->id_buku }}</td>
                        <td>{{ $peminjam->tanggal_pinjam }}</td>
                        <td>{{ $peminjam->tanggal_kembali }}</td>
                        <td>                             <span
                                class="{{ $peminjam->status === 'Sudah Dikembalikan' ? 'fw-semibold text-success' : 'fw-semibold text-danger' }}">
                                {{ $peminjam->status }}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-outline-primary" href="/admin/detailPeminjaman/{{ $peminjam->id }}/{{ $peminjam->id_user }}/{{ $peminjam->id_buku }}">Detail</a>
                            <a class="btn btn-outline-warning"
                                href="/admin/editPeminjaman/{{ $peminjam->id }}">Edit</a>
                            <a class="btn btn-outline-danger"  href="/admin/deletePeminjaman/{{ $peminjam->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>
        {{ $data->links() }}
    </div><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
