<?php

include "koneksi.php";

fdate_default_timezone_set("Asia/Bangkok");

$insert_query = "INSERT INTO t_kasir (noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir) 
                 SELECT noTransaksi, tanggal, idBarang, nmBarang, jumlah, harga, total, ID_Kasir 
                 FROM t_tempkasir";

// Execute the prepared INSERT query
if ($data = mysqli_query($koneksi, $insert_query)) {
    // If the INSERT is successful, display a success message and perform additional actions
    echo "Berhasil Simpan Data Kasir";

    // Prepare and execute the DELETE query to remove data from t_tempkasir
    $delete_query = "DELETE FROM t_tempkasir";
    mysqli_query($koneksi, $delete_query);

    // Prepare and execute the UPDATE query to increment the nomor value in p_noTransaksi
    $update_query = "UPDATE p_noTransaksi SET nomor = nomor + 1";
    mysqli_query($koneksi, $update_query);
} else {
    // If the INSERT fails, display an error message
    echo "Gagal Simpan";
}

// Close the database connection
mysqli_close($koneksi);
?>