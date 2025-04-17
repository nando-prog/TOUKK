TOUKK – Sistem Inventaris Barang Sederhana
TOUKK adalah aplikasi web sederhana berbasis PHP dan MySQL yang dirancang untuk mengelola data inventaris barang. Aplikasi ini memungkinkan pengguna untuk menambahkan, mengedit, menghapus, dan melihat data barang serta kategorinya.​

Fitur
CRUD (Create, Read, Update, Delete) untuk data barang dan kategori.

Manajemen kategori barang.

Antarmuka pengguna yang sederhana dan mudah digunakan.

Struktur kode yang mudah dipahami dan dikembangkan lebih lanjut.​

Struktur Direktori
index.php – Halaman utama yang menampilkan daftar barang.

barang.php – Menampilkan daftar barang.

kategori.php – Menampilkan daftar kategori.

tambah_barang.php – Form untuk menambahkan barang baru.

edit_barang.php – Form untuk mengedit data barang.

hapus_barang.php – Menghapus data barang.

tambah_kategori.php – Form untuk menambahkan kategori baru.

edit_kategori.php – Form untuk mengedit data kategori.

hapus_kategori.php – Menghapus data kategori.

koneksi.php – File konfigurasi koneksi ke database MySQL.

inventaris.sql – File SQL untuk membuat dan mengisi tabel database.​
budimanswalayan.com

Instalasi
Klon repositori ini:​
Right
+1
Right
+1

bash
Copy
Edit
git clone https://github.com/nando-prog/TOUKK.git
Impor database:

Buka phpMyAdmin atau alat manajemen database lainnya.

Buat database baru, misalnya inventaris.

Impor file inventaris.sql ke dalam database tersebut.​
Lexaloffle Games

Konfigurasi koneksi database:

Buka file koneksi.php.

Sesuaikan parameter host, user, password, dan database sesuai dengan konfigurasi Anda.​

Jalankan aplikasi:

Letakkan folder TOukk di direktori root server web Anda (misalnya, htdocs untuk XAMPP).

Akses aplikasi melalui browser: http://localhost/TOukk/.​

Prasyarat
PHP 5.6 atau lebih baru.

MySQL 5.x atau lebih baru.

Server web seperti Apache atau Nginx.​
budimanswalayan.com
+1
Right
+1
Nussknacker
+2
LinkedIn
+2
GitHub
+2

Lisensi
Proyek ini dilisensikan di bawah MIT License.​

Kontribusi
Kontribusi sangat diterima! Jika Anda ingin menambahkan fitur baru atau memperbaiki bug, silakan fork repositori ini dan buat pull request.​

Silakan sesuaikan bagian-bagian di atas sesuai dengan kebutuhan dan informasi spesifik dari proyek Anda.
