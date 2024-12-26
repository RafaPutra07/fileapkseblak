<?php
include "koneksi.php";

// Mendapatkan data dari URL (method GET)
$NoUrut = $_GET['NoUrut'];
$idBarang = $_GET['idBarang'];
$nmBarang = $_GET['nmBarang'];
$harga = $_GET['harga'];
$noTransaksi = $_GET['noTransaksi'];
$userKasir = $_GET['userKasir'];

// Set tanggal
$tanggal = date("Y/m/d");
$jumlah = 1;
$total = $jumlah * $harga;

// Cek apakah barang sudah ada di tabel tempkasir
$data = mysqli_query($koneksi, "SELECT * FROM t_tempkasir WHERE idBarang='$idBarang'");
if (mysqli_num_rows($data) == 0) {
    // Jika barang belum ada, maka insert data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO t_tempkasir (NoUrut, noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir)
                                VALUES ('$NoUrut', '$noTransaksi', '$tanggal', '$idBarang', '$nmBarang', '$jumlah', '$harga', '$total', '$userKasir')");

    if ($simpan) {
        echo "BERHASIL SIMPAN";
    } else {
        echo "GAGAL SIMPAN";
    }
} else {
    // Jika barang sudah ada, maka update jumlah dan total
    echo 'UPDATE';
    while ($hasil = mysqli_fetch_array($data)) {
        $jumlah = $hasil["jumlah"] + 1;
    }
    $total = $jumlah * $harga;

    mysqli_query($koneksi, "UPDATE t_tempkasir SET jumlah='$jumlah', total='$total' WHERE idBarang='$idBarang'");
}
?>