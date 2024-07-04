<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_peng = $_POST['id_peng'];
  $nama_penginapan = $_POST['nama_penginapan'];
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
  
      $query_sql = "UPDATE penginapan SET nama_penginapan='$nama_penginapan', deskripsi='$deskripsi', alamat='$alamat', gambar='$nama_gambar_baru' WHERE id_peng='$id_peng'";
  
      if (mysqli_query($conn, $query_sql)) {
        header("Location: data_penginapan.php");
      } else {
        echo "Edit Gagal: " . mysqli_error($conn);
      }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_edit_penginapan.php';</script>";
      }
    } else {
      echo "<script>alert('Silahkan perbarui gambar terlebih dulu!');window.location='form_edit_penginapan.php';</script>";
    }
  }
  ?>
