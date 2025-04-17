<!-- kategori.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">

        <h3 class="text-center text-primary mb-4">Manajemen Kategori Barang</h3>

        <!-- Tombol Tambah Kategori -->
        <div class="d-flex justify-content-end mb-3">
            <a href="tambah_kategori.php" class="btn btn-warning">+ Tambah Kategori</a>
        </div>

        <!-- Tabel Kategori -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data kategori dari database -->
                <?php
                include 'koneksi.php';
                $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                while ($row = mysqli_fetch_assoc($kategori)) {
                ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama_kategori'] ?></td>
                        <td>
                            <a href="edit_kategori.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="hapus_kategori.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <nav>
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item">
                <a class="page-link" href="barang.php">← Barang</a>
            </li>
            <li class="page-item active">
                <span class="page-link">Kategori</span>
            </li>
        </ul>
    </nav>
</body>

</html>