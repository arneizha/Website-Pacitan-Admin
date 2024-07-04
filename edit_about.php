<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_about = $_POST['id_about'];
  $image = $_FILES['image']['name'];
  $text = $_POST['text'];

  if ($image != "") {
    $ekstensi_diperbolehkan = array("png", "jpg");
    $x = explode(".", $image);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES["image"]["tmp_name"];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . "-" . $image;
  
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
  
      $query_sql = "UPDATE about SET image='$nama_gambar_baru', text='$text' WHERE id_about='$id_about'";
  
      if (mysqli_query($conn, $query_sql)) {
        header("Location: dashboard.php");
      } else {
        echo "Edit Gagal: " . mysqli_error($conn);
      }
    } else {
      echo "<script>alert('Ekstensi gambar hanya bisa png dan jpg!');window.location='form_edit_about.php';</script>";
    }
  } else {
    echo "<script>alert('Silahkan perbarui gambar terlebih dulu!');window.location='form_edit_about.php';</script>";
  }
}
?>
