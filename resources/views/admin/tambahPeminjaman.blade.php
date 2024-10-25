<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Keamanan Sistem Infoasrmi</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.peminjaman') }}">
            <i class="bi-arrow-left h1"></i>
        </a>

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

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">

                    <div class="card-body">
                        <h5 class="card-title text-center">Tambah Data</h5>
                        <form action="{{ route('postTambahPeminjaman') }}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nomor Anggota</label>
                                <input type="text" class="form-control border border-secondary form-control" name="idUser" required value="{{ old('idUser') }}">
                                <span class="text-danger">
                                    @error('idUser')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">ID Buku</label>
                                <input type="text" class="form-control border border-secondary form-control" name="kodeBuku" required value="{{ old('kodeBuku') }}">
                                <span class="text-danger">
                                    @error('kodeBuku')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Peminjaman</label>
                                <input type="date" class="form-control border border-secondary form-control" name="tanggalPeminjaman" required value="{{ old('tanggalPeminjaman') }}">
                                <span class="text-danger">
                                    @error('tanggalPeminjaman')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Tanggal Pengembalian</label>
                                <input type="date" class="form-control border border-secondary form-control" name="tanggalPengembalian" required value="{{ old('tanggalPengembalian') }}">
                                <span class="text-danger">
                                    @error('tanggalPengembalian')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" class="btn btn-success mt-5">Tambah Data Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
</body>
</html>
