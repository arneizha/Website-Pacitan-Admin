<?php

include("koneksi.php");
$id_about = $_GET['id_about'];

mysqli_query($conn, "DELETE FROM about where id_about = '$id_about'");

header("location: dashboard.php");

?>