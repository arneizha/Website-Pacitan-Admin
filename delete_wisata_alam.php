<?php

include("koneksi.php");
$id_wa = $_GET['id_wa'];

mysqli_query($conn, "DELETE FROM wisata_alam where id_wa = '$id_wa'");

header("location: data_wisata_alam.php");

?>