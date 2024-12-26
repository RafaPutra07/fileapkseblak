<?php
include "koneksi.php";

// Ambil nama barang dari parameter GET
$nmBarang = $_GET['NAMA'];

// Atur zona waktu ke Asia/Bangkok
date_default_timezone_set("Asia/Bangkok");

// Jika nama barang kosong, ambil semua data barang
if ($nmBarang == "") {
    $data = mysqli_query($koneksi, "SELECT * FROM t_barang ORDER BY ID ASC");
} else {
    // Jika ada nama barang, cari barang yang namanya mirip
    $data = mysqli_query($koneksi, "SELECT * FROM t_barang WHERE nmBarang LIKE '%$nmBarang%' ORDER BY ID ASC");
}

// Ambil data hasil query dan tampilkan
while ($result = mysqli_fetch_array($data)) {
    echo $result["ID"] . "*";
    echo $result["idBarang"] . "*";
    echo $result["nmBarang"] . "*";
    echo $result["hargaJual"] . "*";
    echo $result["stok"] . "||";
}
?>