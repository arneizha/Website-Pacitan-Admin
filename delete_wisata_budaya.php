<?php

include("koneksi.php");
$id_wb = $_GET['id_wb'];

mysqli_query($conn, "DELETE FROM wisata_budaya where id_wb = '$id_wb'");

header("location: data_wisata_budaya.php");

?>