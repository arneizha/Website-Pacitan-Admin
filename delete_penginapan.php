<?php

include("koneksi.php");
$id_peng = $_GET['id_peng'];

mysqli_query($conn, "DELETE FROM penginapan where id_peng = '$id_peng'");

header("location: data_penginapan.php");

?>