<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_kul = $_POST['id_kul'];
  $nama_kuliner = $_POST['nama_kuliner'];
  $deskripsi = $_POST['deskripsi'];
  $alamat = $_POST['alamat'];
  $gambar = $_FILES['gambar']['name'];

  if ($gambar != "") {
    $ekstensi_diperbolehkan = array("png", "jpg");
    $x = explode(".", $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES["gambar"]["tmp_name"];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . "-" . $gambar;
  
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
      move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
  
      $query_sql = "UPDATE kuliner SET nama_kuliner='$nama_kuliner', deskripsi='$deskripsi', alamat='$alamat', gambar='$nama_gambar_baru' WHERE id_kul='$id_kul'";
  
      if (mysqli_query($conn, $query_sql)) {
        header("Location: data_kuliner.php");
      } else {
        echo "Edit Gagal: " . mysqli_error($conn);
      }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_edit_kuliner.php';</script>";
      }
    } else {
      echo "<script>alert('Silahkan perbarui gambar terlebih dulu!');window.location='form_edit_kuliner.html';</script>";
    }
  }
  ?>
