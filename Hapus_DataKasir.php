<?php
include "koneksi.php";

// Ambil nilai ID dari parameter GET
$ID = $_GET['ID'];

// Atur zona waktu ke Asia/Bangkok
date_default_timezone_set("Asia/Bangkok");

// Query untuk menghapus data dengan ID tertentu dari tabel t_tempkasir
$hapus = mysqli_query($koneksi, "DELETE FROM t_tempkasir WHERE ID=$ID");

// Cek apakah query berhasil dijalankan
if ($hapus) {
    echo "Data Sudah Terhapus";
} else {
    // Tambahkan pesan error jika query gagal
    echo "Gagal Menghapus Data";
}
?>