<?php

include("koneksi.php");
$id_kul = $_GET['id_kul'];

mysqli_query($conn, "DELETE FROM kuliner where id_kul = '$id_kul'");

header("location: data_kuliner.php");

?>