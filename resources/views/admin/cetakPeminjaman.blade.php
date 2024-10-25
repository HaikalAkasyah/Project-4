<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min
.css">
    <title>Cetak Data Peminjaman</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Peminjaman Buku</b></p>         <table class="table table-bordered" align="center" rules="all" border="1px" style="width: 95%">             <tr>
                <th>No</th>
                <th>ID</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>ID User</th>
                <th>ID Buku</th>
            </tr>
            @foreach ($data as $peminjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjam->id }}</td>
                    <td>{{ $peminjam->tanggal_pinjam }}</td>
                    <td>{{ $peminjam->tanggal_kembali }}</td>
                    <td>{{ $peminjam->id_user }}</td>
                    <td>{{ $peminjam->id_buku }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">         window.print()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundl e.min.js"></script>
</body>
</html>
