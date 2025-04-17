<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id='$id'");
    header("Location: kategori.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4 text-warning">Edit Kategori</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?= $row['nama_kategori'] ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="kategori.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>