<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Buku</title>
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
                </a>
            </div>
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
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
                            </h5>
                        </li>
                        <li class="nav-item" style="margin-left: 30px">
                            <h5>
                                <a class="nav-link" aria-current="page" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
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
                    <strong>Gagal!</strong> {{ Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.buku') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari nama buku" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('admin.tambahBuku') }}" style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
            </div>
        </div>

        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $buku)
                    <tr>
                        <td scope="row">{{ $index + $data->firstItem() }}</td>
                        <td>
                            <img style="width: 50px" src="{{ asset('/images/' . $buku->gambar) }}" alt="cover buku">
                        </td>
                        <td>{{ $buku->kode_buku }}</td>
                        <td>{{ $buku->judul_buku }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->kategori }}</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>
                            <a class="btn btn-outline-warning" href="/admin/editBuku/{{ $buku->id }}">Edit</a>
                            <a class="btn btn-outline-danger" href="/admin/deleteBuku/{{ $buku->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        {{ $data->links() }}
    </div>

    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
