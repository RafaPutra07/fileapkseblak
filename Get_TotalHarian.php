<?php
include "koneksi.php";

date_default_timezone_set("Asia/Bangkok");

// Query untuk total harian
$data_harian = mysqli_query($koneksi, "SELECT SUM(total)total_harian FROM t_kasir WHERE tanggal = CURDATE()");

// Mengambil hasil query
while ($harian = mysqli_fetch_array($data_harian)) {
    echo number_format($harian["total_harian"]);
    echo "|";
}

// Query untuk total bulanan
$data_bulan=mysqli_query($koneksi, "SELECT SUM(total)total_bulan FROM t_kasir WHERE MONTH(tanggal)=MONTH(CURDATE())");

// Mengambil hasil query
while ($bulan = mysqli_fetch_array($data_bulan)) {
    echo number_format($bulan["total_bulan"]);
    echo "|";
}
?>