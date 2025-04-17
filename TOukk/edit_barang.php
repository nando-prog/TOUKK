<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama    = $_POST['nama_barang'];
    $kategori = $_POST['kategori_id'];
    $stok    = $_POST['stok'];
    $harga   = $_POST['harga'];
    $tanggal = $_POST['tanggal_masuk'];

    mysqli_query($conn, "UPDATE barang SET 
      nama_barang='$nama',
      kategori_id='$kategori',
      stok='$stok',
      harga='$harga',
      tanggal_masuk='$tanggal'
      WHERE id='$id'
    ");
    header("Location: barang.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4 text-warning">Edit Barang</h3>

        <form method="POST" class="mx-auto" style="max-width: 600px;">
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?= $row['nama_barang'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                    while ($k = mysqli_fetch_assoc($kategori)) {
                        $selected = ($row['kategori_id'] == $k['id']) ? 'selected' : '';
                        echo "<option value='" . $k['id'] . "' $selected>" . $k['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?= $row['stok'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" value="<?= $row['harga'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" name="tanggal_masuk" value="<?= $row['tanggal_masuk'] ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="barang.php" class="btn btn-secondary">Batal</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>