<?php

session_start();
include "koneksi.php";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (!isset($_SESSION['username'])) {
  die("Anda belum login");
}

$username = $_SESSION['username'];
$sql = "SELECT * from admin where username='$username'";
$query = $conn->query($sql);
$data = $query->fetch_array();
?>


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin - Data Wisata Religi</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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
            <a class="nav-link" href="data_wisata_religi.php" style="color: white;">
              <div class="sb-nav-link-icon"></i></div>
              Data Wisata Religi
            </a>
            <a class="nav-link" href="data_kuliner.php">
              <div class="sb-nav-link-icon"></i></div>
              Data Kuliner
            </a>
            <a class="nav-link" href="data_penginapan.php">
              <div class="sb-nav-link-icon"></i></div>
              Data Penginapan
            </a>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon"></i></div>
              Logout
            </a>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Data Wisata Religi</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="form_input_wisata_religi.html">
                <button type="button" class="btn btn-success">Insert Data</button>
              </a>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Image</th>                        
                        <th>Kelola</th>
                      </tr>
                    </thead>
                    <?php
                    $tampil = mysqli_query($conn, "select * from wisata_religi");
                    $No = 1;
                    while ($hasil = mysqli_fetch_array($tampil)) {
                    ?>
                      <tr>
                        <td><?php echo $No++; ?></td>
                        <td><?php echo $hasil['nama_wisata']; ?></td>
                        <td><?php echo $hasil['deskripsi']; ?></td>
                        <td><?php echo $hasil['alamat']; ?></td>
                        <td><?php echo '<img src="gambar/' . $hasil['gambar'] .'">'; ?></td>
                        <td>
                          <a href="form_edit_wisata_religi.php?id_wr=<?php echo $hasil['id_wr'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                          <a href="delete_wisata_religi.php?id_wr=<?php echo $hasil['id_wr'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </main>

    </div>
  </div>
</body>