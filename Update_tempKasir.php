<?php
include "koneksi.php";

// Ambil data dari URL (method GET)
$id = $_GET['ID'];
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];
$total = $jumlah * $harga;

// Query UPDATE untuk memperbarui data di tabel t_tempkasir
$query = "UPDATE t_tempkasir SET jumlah='$jumlah', total='$total' WHERE No='$id'";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Cek hasil eksekusi
if ($result) {
    echo "Berhasil Update Data Barang";
} else {
    echo "Gagal Update Data Barang. Error: " . mysqli_error($koneksi);
}
?>