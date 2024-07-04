<?php
require 'koneksi.php';

$image = $_FILES["image"]["name"];
$text = $_POST["text"];

if ($image != "") {
  $ekstensi_diperbolehkan = array("png", "jpg");
  $x = explode(".", $image);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES["image"]["tmp_name"];
  $angka_acak = rand(1, 999);
  $nama_gambar_baru = $angka_acak . "-" . $image;

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

    $query_sql = "INSERT INTO about (image, text) VALUES ('$nama_gambar_baru', '$text')";

    if (mysqli_query($conn, $query_sql)) {
      header("Location: dashboard.php");
    } else {
      echo "Pendaftaran Gagal: " . mysqli_error($conn);
    }
  } else {
    echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_input_about.html';</script>";
  }
} else {
  echo "<script>alert('Silahkan upload gambar dulu!');window.location='form_input_about.html';</script>";
}

mysqli_close($conn);
?>
