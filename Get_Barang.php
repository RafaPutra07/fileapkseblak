<?php
include "koneksi.php";
$ID = $_GET['ID'];
//SidBarang $_GET['idBarang'];
date_default_timezone_set("Asia/Bangkok");

if (strlen($ID) > 4) {
    $data = mysqli_query($koneksi, "SELECT * FROM t_barang WHERE idBarang='$ID'");

    while($result=mysqli_fetch_array($data)) {
        echo $result["nmBarang"];
        echo"|";
        echo $result["hargaJual"];
        echo"|";
        echo $result["stok"];

        //UPDATE Stok Barang
        mysqli_query($koneksi, "UPDATE t_barang SET stok=stok-1 WHERE idBarang='$ID'");
    }
} else {
    $datakasir = mysqli_query($koneksi, "SELECT * FROM t_tempkasir WHERE No='$TD'");

    while($hasil=mysqli_fetch_array($datakasir)){
        echo $hasil["nmBarang"];
        echo"|";
        echo $hasil["jumlah"];
        echo "|";
        echo $hasil["harga"];
    }
}