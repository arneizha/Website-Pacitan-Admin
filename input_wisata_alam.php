<?php
require 'koneksi.php';

$nama_wisata = $_POST["nama_wisata"];
$deskripsi = $_POST["deskripsi"];
$alamat = $_POST["alamat"];
$gambar = $_FILES["gambar"]["name"];

if ($gambar != "") {
  $ekstensi_diperbolehkan = array("png", "jpg");
  $x = explode(".", $gambar);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES["gambar"]["tmp_name"];
  $angka_acak = rand(1, 999);
  $nama_gambar_baru = $angka_acak . "-" . $gambar;

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

    $query_sql = "INSERT INTO wisata_alam (nama_wisata, deskripsi, alamat, gambar) VALUES ('$nama_wisata', '$deskripsi', '$alamat', '$nama_gambar_baru')";

    if (mysqli_query($conn, $query_sql)) {
      header("Location: data_wisata_alam.php");
    } else {
      echo "Pendaftaran Gagal: " . mysqli_error($conn);
    }
  } else {
    echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_input_wisata_alam.html';</script>";
  }
} else {
  echo "<script>alert('Silahkan upload gambar dulu!');window.location='form_input_wisata_alam.html';</script>";
}

mysqli_close($conn);
?>
