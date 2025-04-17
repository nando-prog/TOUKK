<?php
include 'koneksi.php';

// Simpan data jika form disubmit
if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama_barang'];
    $kategori = $_POST['kategori_id'];
    $stok    = $_POST['stok'];
    $harga   = $_POST['harga'];
    $tanggal = $_POST['tanggal_masuk'];

    mysqli_query($conn, "INSERT INTO barang (nama_barang, kategori_id, stok, harga, tanggal_masuk)
                            VALUES ('$nama', '$kategori', '$stok', '$harga', '$tanggal')");
    header("Location: barang.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 600px;">
            <h4 class="text-center text-primary mb-3">Tambah Barang</h4>

            <form method="POST">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                        while ($row = mysqli_fetch_assoc($kategori)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nama_kategori'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control" name="tanggal_masuk" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="barang.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>