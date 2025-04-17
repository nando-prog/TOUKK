<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "inventaris");
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}

// Ambil data pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$kategori_id = isset($_GET['kategori']) ? (int)$_GET['kategori'] : 0;

// Buat query filter
$where = [];
if (!empty($search)) {
    $where[] = "barang.nama LIKE '%$search%'";
}
if (!empty($kategori_id)) {
    $where[] = "barang.kategori_id = $kategori_id";
}

$filter = '';
if (!empty($where)) {
    $filter = "WHERE " . implode(" AND ", $where);
}

            // Ambil data barang
            $sql = "SELECT barang.*, kategori.nama_kategori AS nama_kategori 
        FROM barang 
        INNER JOIN kategori ON barang.kategori_id = kategori.id 
        $filter 
        ORDER BY barang.id DESC";

            $result = mysqli_query($koneksi, $sql);

// Ambil semua kategori untuk filter
$kategori_result = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="text-center text-primary mb-4">Data Barang</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="tambah_barang.php" class="btn btn-success">+ Tambah Barang</a>
        <a href="kategori.php" class="btn btn-outline-primary">Kelola Kategori</a>
    </div>

    <!-- Form pencarian -->
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-4">
            <select name="kategori" class="form-select">
                <option value="">Semua Kategori</option>
                <?php while ($kat = mysqli_fetch_assoc($kategori_result)) : ?>
                    <option value="<?= $kat['id'] ?>" <?= ($kategori_id == $kat['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($kat['nama_kategori']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <!-- Tabel barang -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                        <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                        <td><?= $row['stok'] ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td><?= $row['tanggal_masuk'] ?></td>
                        <td>
                            <a href="edit_barang.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus_barang.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Data barang tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
