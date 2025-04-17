<?php
include 'koneksi.php';

$id = $_GET['id'];

// Cek apakah kategori digunakan di barang
$cek = mysqli_query($conn, "SELECT COUNT(*) AS total FROM barang WHERE kategori_id = '$id'");
$data = mysqli_fetch_assoc($cek);

if ($data['total'] > 0) {
    echo "<script>
        alert('Kategori tidak bisa dihapus karena masih digunakan di tabel barang!');
        window.location.href = 'kategori.php';
    </script>";
} else {
    mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
    header("Location: kategori.php");
}
