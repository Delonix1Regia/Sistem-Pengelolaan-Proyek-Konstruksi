<?php
include 'koneksi.php';
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (!isset($_SESSION['username'])) {
  die("Anda belum login");
}

// if ($_SESSION['status'] != 'admin') {
//   die("Akses ditolak. Anda bukan admin");
// }

$username = $_SESSION['username'];
$level = $_SESSION['status'];

?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="style/main.css" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-dark" href="landing.html">Be:Construct</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="landing.html">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Main</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Menu
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="ProyekKlien.php">Daftar Proyek</a>
                <a class="nav-link" href="ArsitekKlien.php">
                  Arsitek
                </a>
                <a class="nav-link" href="PeralatanKlien.php">
                  Peralatan
                </a>
                <a class="nav-link" href="MaterialKlien.php">
                  Material
                </a>
              </nav>
            </div>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
              </nav>
            </div>

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?= $username ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h2 class="mt-4">Daftar Proyek</h2>
          <!-- <h1 class="mt-4">Selamat datang, <?= $username; ?>!</h1> -->
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Berikut merupakan Daftar Proyek yang tersedia!</li>
          </ol>

          <div class="container">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Proyek
              </div>
              <div class="card-body">
                <form id="form-multidelete" action="Proyek.php" method="post">
                  <!-- Tambah Proyek Baru Button -->
                  <table id="datatablesSimple">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>ID Proyek</th>
                        <th>Nama Proyek</th>
                        <th>Nama Klien</th>
                        <th>Nama Arsitek</th>
                        <th>Nama Kontraktor</th>
                        <th>Biaya</th>
                        <th>Gambar Proyek</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "
                      SELECT 
                        proyek.id_proyek, 
                        proyek.nama_proyek, 
                        proyek.id_klien,
                        klien.nama_klien,
                        proyek.id_arsitek,
                        arsitek.nama_arsitek, 
                        proyek.id_kontraktor,
                        kontraktor.nama_kontraktor,
                        proyek.id_biaya,
                        biaya.jml_biaya,
                        proyek.gambar_proyek
                      FROM 
                        proyek
                      JOIN 
                        klien ON proyek.id_klien = klien.id_klien
                      JOIN 
                        arsitek ON proyek.id_arsitek = arsitek.id_arsitek
                      JOIN 
                        kontraktor ON proyek.id_kontraktor = kontraktor.id_kontraktor
                      JOIN 
                        biaya ON proyek.id_biaya = biaya.id_biaya
                    ";

                      $result = mysqli_query($koneksi, $query);

                      if (!$result) {
                        die('Query Error: ' . mysqli_error($koneksi));
                      }

                      while ($data = mysqli_fetch_array($result)) {
                        $id_proyek = $data['id_proyek'];
                        $namaProyek = $data['nama_proyek'];
                        $idKlien = $data['id_klien'];
                        $namaKlien = $data['nama_klien'];
                        $idArsitek = $data['id_arsitek'];
                        $namaArsitek = $data['nama_arsitek'];
                        $idKontraktor = $data['id_kontraktor'];
                        $namaKontraktor = $data['nama_kontraktor'];
                        $idBiaya = $data['id_biaya'];
                        $jmlBiaya = $data['jml_biaya'];
                        $gambarProyek = $data['gambar_proyek'];
                      ?>
                        <tr>
                          <td><input type="checkbox" name="id_proyek[]" value="<?= $id_proyek ?>" class="checkItem"></td>
                          <td><?= $id_proyek ?></td>
                          <td><?= $namaProyek ?></td>
                          <td><?= $namaKlien ?></td>
                          <td><?= $namaArsitek ?></td>
                          <td><?= $namaKontraktor ?></td>
                          <td><?= $jmlBiaya ?></td>
                          <td><img src="./uploads/<?= $gambarProyek ?>" alt="Gambar Proyek"></td>
                          <td>
                            <!-- <button type="button" class="btn btn-primary editProjectBtn" data-id="<?= $id_proyek ?>" data-nama="<?= $namaProyek ?>" data-idklien="<?= $idKlien ?>" data-namaklien="<?= $namaKlien ?>" data-idarsitek="<?= $idArsitek ?>" data-namaarsitek="<?= $namaArsitek ?>" data-idkontraktor="<?= $idKontraktor ?>" data-namakontraktor="<?= $namaKontraktor ?>" data-idbiaya="<?= $idBiaya ?>" data-jmlbiaya="<?= $jmlBiaya ?>" data-gambarproyek="<?= $gambarProyek ?>">Edit</button> -->
                            <a href="./uploads/<?= $gambarProyek ?>" download class="btn btn-primary">Download</a>
                            <!-- <a href="deleteProyek.php?id=<?= $row['id_proyek'] ?>" class="btn btn-danger btn-sm">Delete</a> -->
                          </td>

                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>