<?php
include 'koneksi.php';

if (isset($_GET['id_peng'])) {
  $id_peng = $_GET['id_peng'];

  // Query untuk mendapatkan data nasabah berdasarkan NIN
  $query = "SELECT * FROM penginapan WHERE id_peng='$id_peng'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_peng = $row['id_peng'];
    $nama_penginapan = $row['nama_penginapan'];
    $deskripsi = $row['deskripsi'];
    $alamat = $row['alamat'];
    $gambar = $row['gambar'];
} else {
    echo "No data found.";
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin - Edit Data Penginapan</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    /* Add custom styles for the form */
    body {
      background-color: #f8f9fa;
    }

    .card-body {
      margin-top: 20px;
      background-color: #fff;
      padding: 30px;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .box-input {
      margin-bottom: 20px;
    }

    .box-input input[type="text"],
    .box-input input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .box-input input[type="text"]:focus,
    .box-input input[type="password"]:focus {
      outline: none;
      box-shadow: 0 0 5px #6c757d;
    }

    .box-input label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="login_admin.php" style="font-weight: bold; font-size: 1.6rem;">Welcome Admin</a>
    <!-- Navbar-->
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
          <a class="nav-link" href="dashboard.php">
              <div class="sb-nav-link-icon"></div>
              Data About
            </a>
            <a class="nav-link" href="data_wisata_alam.php">
              <div class="sb-nav-link-icon"></div>
              Data Wisata Alam
            </a>
            <a class="nav-link" href="data_wisata_budaya.php">
              <div class="sb-nav-link-icon"></div>
              Data Wisata Budaya
            </a>
            <a class="nav-link" href="data_wisata_religi.php">
              <div class="sb-nav-link-icon"></i></div>
              Data Wisata Religi
            </a>
            <a class="nav-link" href="data_kuliner.php">
              <div class="sb-nav-link-icon"></i></div>
              Data Kuliner
            </a>
            <a class="nav-link" href="data_penginapan.php" style="color: white;">
              <div class="sb-nav-link-icon"></i></div>
              Data Penginapan
            </a>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon"></i></div>
              Logout
            </a>
          </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Edit Data Penginapan</h1>

          <!-- Form Edit Data Penginapan -->
          <div class="card-body">
            <form action="edit_penginapan.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id_peng" value="<?php echo $id_peng; ?>">
              <div class="box-input">
                <label for="nama_penginapan">Nama Penginapan</label>
                <input type="text" id="nama_kuliner" name="nama_penginapan" value="<?php echo $nama_penginapan; ?>" />
              </div>
              <div class="box-input">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>" />
              </div>
              <div class="box-input">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" />
              </div>
              <div class="box-input">
                <label for="gambar">Image</label>
                <div class="image-wrapper">
                  <img src="gambar/<?php echo $gambar ?>">
                </div>
                <input type="file" id="gambar" name="gambar" />
              </div>
              <br />
              <input type="submit" value="Update" name="submit" class="btn btn-success"><br />
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
