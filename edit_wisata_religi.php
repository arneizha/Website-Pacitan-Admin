<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_wr = $_POST['id_wr'];
  $nama_wisata = $_POST['nama_wisata'];
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
  
      $query_sql = "UPDATE wisata_religi SET nama_wisata='$nama_wisata', deskripsi='$deskripsi', alamat='$alamat', gambar='$nama_gambar_baru' WHERE id_wr='$id_wr'";
  
      if (mysqli_query($conn, $query_sql)) {
        header("Location: data_wisata_religi.php");
      } else {
        echo "Edit Gagal: " . mysqli_error($conn);
      }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_edit_wisata_religi.php';</script>";
      }
    } else {
      echo "<script>alert('Silahkan perbarui gambar terlebih dulu!');window.location='form_edit_wisata_religi.php';</script>";
    }
  }
  ?>
