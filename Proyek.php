<?php
include 'koneksi.php';
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (!isset($_SESSION['username'])) {
  die("Anda belum login");
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['id_proyek'])) {
    $id_proyek = $_POST['id_proyek'];
    foreach ($id_proyek as $id) {
      $query = "DELETE FROM proyek WHERE id_proyek = $id";
      mysqli_query($koneksi, $query);
    }
    header('Location: Proyek.php');
  }
}
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
    <a class="navbar-brand ps-3 text-dark" href="Dashboard.html">Dashbord</a>
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
          <li><a class="dropdown-item" href="login.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="Dashboard.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu Utama</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Proyek
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="Proyek.php">Daftar Proyek</a>
                <a class="nav-link" href="Tugas.php">Daftar Tugas</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Data Lainnya
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="Klien.php">
                  Klien
                </a>
                <a class="nav-link" href="Arsitek.php">
                  Arsitek
                </a>
                <a class="nav-link" href="Teknisi.php">
                  Teknisi
                </a>
                <a class="nav-link" href="Kontraktor.php">
                  Kontraktor
                </a>
                <a class="nav-link" href="Biaya.php">
                  Biaya
                </a>
                <a class="nav-link" href="Peralatan.php">
                  Peralatan
                </a>
                <a class="nav-link" href="Material.php">
                  Material
                </a>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chart-area"></i>
              </div>
              ----
            </a>
            <a class="nav-link" href="tables.html">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              ----
            </a>
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
                  <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createProjectModal">Tambah Proyek Baru</button>
                  <button type="submit" id="btn-delete" class="btn btn-danger mb-2" style="display:none;">Delete Selected</button>
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
                            <div class="d-flex justify-content-between">
                              <button type="button" class="btn btn-primary editProjectBtn" data-id="<?= $id_proyek ?>" data-nama="<?= $namaProyek ?>" data-idklien="<?= $idKlien ?>" data-namaklien="<?= $namaKlien ?>" data-idarsitek="<?= $idArsitek ?>" data-namaarsitek="<?= $namaArsitek ?>" data-idkontraktor="<?= $idKontraktor ?>" data-namakontraktor="<?= $namaKontraktor ?>" data-idbiaya="<?= $idBiaya ?>" data-jmlbiaya="<?= $jmlBiaya ?>" data-gambarproyek="<?= $gambarProyek ?>">Edit</button>
                              <a href="./uploads/<?= $gambarProyek ?>" download class="btn btn-primary">Download</a>
                            </div>
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


        <!-- Create -->
        <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createProjectModalLabel">Tambah Proyek Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="form-create-project" action="createProyek.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nama_proyek">Nama Proyek:</label>
                    <input type="text" id="nama_proyek" name="nama_proyek" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="id_klien">Klien:</label>
                    <select id="id_klien" name="id_klien" class="form-control" required>
                      <option value="" disabled selected>Pilih Klien</option>
                      <?php
                      include 'koneksi.php';
                      $query = "SELECT * FROM klien";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_klien']}'>{$row['nama_klien']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_arsitek">Arsitek:</label>
                    <select id="id_arsitek" name="id_arsitek" class="form-control" required>
                      <option value="" disabled selected>Pilih Arsitek</option>
                      <?php
                      $query = "SELECT * FROM arsitek";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_arsitek']}'>{$row['nama_arsitek']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_kontraktor">Kontraktor:</label>
                    <select id="id_kontraktor" name="id_kontraktor" class="form-control" required>
                      <option value="" disabled selected>Pilih Kontraktor</option>
                      <?php
                      $query = "SELECT * FROM kontraktor";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_kontraktor']}'>{$row['nama_kontraktor']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_biaya">Biaya:</label>
                    <select id="id_biaya" name="id_biaya" class="form-control" required>
                      <option value="" disabled selected>Pilih Biaya</option>
                      <?php
                      $query = "SELECT * FROM biaya";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_biaya']}'>{$row['jml_biaya']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="gambar_proyek">Gambar Proyek</label>
                    <input type="file" id="gambar_proyek" name="gambar_proyek" class="form-control" accept="image/*" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah Proyek</button>
                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- Edit -->
        <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editProjectModalLabel">Edit Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="form-edit-project" action="editProyek.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="edit_id_proyek" name="id_proyek">
                  <div class="form-group">
                    <label for="edit_nama_proyek">Nama Proyek:</label>
                    <input type="text" id="edit_nama_proyek" name="nama_proyek" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="klien">Klien:</label>
                    <select id="klien" name="id_klien" class="form-control">
                      <option id="edit_id_klien" />
                      <?php
                      $query = "SELECT * FROM klien";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_klien']}'>{$row['nama_klien']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="arsitek">Arsitek:</label>
                    <select id="arsitek" name="id_arsitek" class="form-control">
                      <option id="edit_id_arsitek" />
                      <?php
                      $query = "SELECT * FROM arsitek";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_arsitek']}'>{$row['nama_arsitek']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kontraktor">Kontraktor:</label>
                    <select id="kontraktor" name="id_kontraktor" class="form-control">
                      <option id="edit_id_kontraktor" />
                      <?php
                      $query = "SELECT * FROM kontraktor";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_kontraktor']}'>{$row['nama_kontraktor']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="biaya">Biaya:</label>
                    <select id="biaya" name="id_biaya" class="form-control">
                      <option id="edit_id_biaya" />
                      <?php
                      $query = "SELECT * FROM biaya";
                      $result = mysqli_query($koneksi, $query);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['id_biaya']}'>{$row['jml_biaya']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div>
                    <label for="gambar_proyek">Gambar Proyek</label>
                    <input type="file" id="gambar_proyek" name="edit_gambar_proyek" class="form-control" accept="image/*">
                    <option id="edit_gambar_proyek" />
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
              </div>
            </div>
          </div>
        </div>




        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const checkAll = document.getElementById('checkAll');
            const checkItems = document.querySelectorAll('.checkItem');
            const btnDelete = document.getElementById('btn-delete');

            checkAll.addEventListener('change', function() {
              checkItems.forEach(function(item) {
                item.checked = checkAll.checked;
              });
              toggleDeleteButton();
            });

            checkItems.forEach(function(item) {
              item.addEventListener('change', toggleDeleteButton);
            });

            function toggleDeleteButton() {
              const anyChecked = Array.from(checkItems).some(item => item.checked);
              btnDelete.style.display = anyChecked ? 'block' : 'none';
            }

            document.querySelector('tbody').addEventListener('click', function(e) {
              if (e.target.classList.contains('editProjectBtn')) {
                const id = e.target.dataset.id;
                const nama = e.target.dataset.nama;
                const idKlien = e.target.dataset.idklien;
                const namaKlien = e.target.dataset.namaklien;
                const idArsitek = e.target.dataset.idarsitek;
                const namaArsitek = e.target.dataset.namaarsitek;
                const idKontraktor = e.target.dataset.idkontraktor;
                const namaKontraktor = e.target.dataset.namakontraktor;
                const idBiaya = e.target.dataset.idbiaya;
                const jmlBiaya = e.target.dataset.jmlbiaya;
                const gambarProyek = e.target.dataset.gambarproyek;


                document.getElementById('edit_id_proyek').value = id;
                document.getElementById('edit_nama_proyek').value = nama;

                let optionElementKlien = document.getElementById('edit_id_klien');
                optionElementKlien.value = idKlien;
                optionElementKlien.textContent = namaKlien;
                optionElementKlien.selected = true;
                optionElementKlien.disabled = false;

                let optionElementArsitek = document.getElementById('edit_id_arsitek');
                optionElementArsitek.value = idArsitek;
                optionElementArsitek.textContent = namaArsitek;
                optionElementArsitek.selected = true;
                optionElementArsitek.disabled = false;

                let optionElementKontraktor = document.getElementById('edit_id_kontraktor');
                optionElementKontraktor.value = idKontraktor;
                optionElementKontraktor.textContent = namaKontraktor;
                optionElementKontraktor.selected = true;
                optionElementKontraktor.disabled = false;

                let optionElementBiaya = document.getElementById('edit_id_biaya');
                optionElementBiaya.value = idBiaya;
                optionElementBiaya.textContent = jmlBiaya;
                optionElementBiaya.selected = true;
                optionElementBiaya.disabled = false;

                let optionElementGambar = document.getElementById('edit_gambar_proyek');
                optionElementGambar.value = gambarProyek;



                new bootstrap.Modal(document.getElementById('editProjectModal')).show();
              }
            });
          });
        </script>

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