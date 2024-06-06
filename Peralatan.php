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
  if (isset($_POST['id_alat'])) {
    $id_alat = $_POST['id_talat'];
    foreach ($id_alat as $id) {
      $query = "DELETE FROM peralatan WHERE id_alat = $id";
      mysqli_query($koneksi, $query);
    }
    header('Location: Peralatan.php');
  }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3 text-dark" href="Dashboard.html">Dashbord</a>
      <!-- Sidebar Toggle-->
      <button
        class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"
        href="#!"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <form
        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
      >
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search for..."
            aria-describedby="btnNavbarSearch"
          />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="navbarDropdown"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fas fa-user fa-fw"></i
          ></a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdown"
          >
            <li><a class="dropdown-item" href="#!">Settings</a></li>
            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
            <li><hr class="dropdown-divider" /></li>
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
              <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
              >
                <div class="sb-nav-link-icon">
                  <i class="fas fa-columns"></i>
                </div>
                Proyek
                <div class="sb-sidenav-collapse-arrow">
                  <i class="fas fa-angle-down"></i>
                </div>
              </a>
              <div
                class="collapse"
                id="collapseLayouts"
                aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion"
              >
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="Proyek.php"
                    >Daftar Proyek</a
                  >
                  <a class="nav-link" href="Tugas.php"
                    >Daftar Tugas</a
                  >
                </nav>
              </div>
              <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapsePages"
                aria-expanded="false"
                aria-controls="collapsePages"
              >
                <div class="sb-nav-link-icon">
                  <i class="fas fa-book-open"></i>
                </div>
                Data Lainnya
                <div class="sb-sidenav-collapse-arrow">
                  <i class="fas fa-angle-down"></i>
                </div>
              </a>
              <div
                class="collapse"
                id="collapsePages"
                aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion"
              >
                <nav
                  class="sb-sidenav-menu-nested nav accordion"
                  id="sidenavAccordionPages"
                >
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
          <h2 class="mt-4">Daftar Peralatan</h2>
          <!-- <h1 class="mt-4">Selamat datang, <?= $username ?>!</h1> -->
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Berikut merupakan Daftar Alat yang tersedia!</li>
            </ol>

                   
          
              <div class="container">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Peralatan Yang Tersedia
      </div>
      <div class="card-body">
  <form id="form-multidelete" action="Peralatan.php" method="post">
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createTaskModal">Tambah Tugas Baru</button>
    <button type="submit" id="btn-delete" class="btn btn-danger mb-2" style="display:none;">Delete Selected</button>
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th><input type="checkbox" id="checkAll"></th>
          <th>ID</th>
          <th>Nama Peralatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM peralatan";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
          die('Query Error: ' . mysqli_error($koneksi));
        }

        while ($data = mysqli_fetch_array($result)) {
          $id_alat = $data['id_alat'];
          $namaAlat = $data['nama_alat'];
        ?>
        <tr>
          <td><input type="checkbox" name="id_alat[]" value="<?= $id_alat ?>" class="checkItem"></td>
          <td><?= $id_alat ?></td>
          <td><?= $namaAlat ?></td>
          <td>
            <a href="#" class="editTaskBtn" data-id="<?= $id_alat ?>" data-nama="<?= $namaAlat ?>">Edit</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </form>
</div>


    <!-- Create -->
      <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createTaskModalLabel">Tambah Alat Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="form-create-task" action="createAlat.php" method="post">
                <div class="form-group">
                  <label for="nama_alat">Nama Alat:</label>
                  <input type="text" id="nama_alat" name="nama_alat" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Tambah Alat</button>
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
        <h5 class="modal-title" id="editProjectModalLabel">Edit Alat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-edit-project" action="editAlat.php" method="post">
          <input type="hidden" id="edit_id_alat" name="id_alat">
          <div class="form-group">
            <label for="edit_nama_alat">Nama Alat:</label>
            <input type="text" id="edit_nama_alat" name="nama_alat" class="form-control" required>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>





<script>
  document.addEventListener('DOMContentLoaded', function () {
    const checkAll = document.getElementById('checkAll');
    const checkItems = document.querySelectorAll('.checkItem');
    const btnDelete = document.getElementById('btn-delete');
    
    checkAll.addEventListener('change', function () {
      checkItems.forEach(function (item) {
        item.checked = checkAll.checked;
      });
      toggleDeleteButton();
    });

    checkItems.forEach(function (item) {
      item.addEventListener('change', toggleDeleteButton);
    });

    function toggleDeleteButton() {
      const anyChecked = Array.from(checkItems).some(item => item.checked);
      btnDelete.style.display = anyChecked ? 'block' : 'none';
    }

    document.querySelector('tbody').addEventListener('click', function (e) {
      if (e.target.classList.contains('editTaskBtn')) {
        const id = e.target.dataset.id;
        const nama = e.target.dataset.nama;

        document.getElementById('edit_id_alat').value = id;
        document.getElementById('edit_nama_alat').value = nama;

        new bootstrap.Modal(document.getElementById('editProjectModal')).show();
      }
    });
  });
</script>


      </main>

    </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
      crossorigin="anonymous"
    ></script>

    


    <script src="js/datatables-simple-demo.js"></script>
  </body>
</html>
