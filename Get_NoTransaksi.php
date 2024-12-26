<?php
Include "koneksi.php";

date_default_timezone_set("Asia/Bangkok");
$data = mysqli_query($koneksi,"SELECT * FROM p_NoTransaksi");

while($result=mysqli_fetch_array($data)){
	echo date("dmY")
	echo "/",$result["Nomor"];
}

?>