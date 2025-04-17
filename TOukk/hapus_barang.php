<?php
include 'koneksi.php'; // koneksi ke database

// Cek apakah ada id yang dikirim lewat URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Jalankan query hapus
    $query = "DELETE FROM barang WHERE id='$id'";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        // Jika berhasil, kembali ke halaman barang
        header("Location: barang.php");
        exit;
    } else {
        echo "Gagal menghapus barang: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan di URL.";
}
