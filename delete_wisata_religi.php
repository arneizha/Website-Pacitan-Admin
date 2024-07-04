<?php

include("koneksi.php");
$id_wr = $_GET['id_wr'];

mysqli_query($conn, "DELETE FROM wisata_religi where id_wr = '$id_wr'");

header("location: data_wisata_religi.php");

?>