<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_alat = $_POST['id_alat'];
  $namaAlat = $_POST['nama_alat'];

  $query = "
    UPDATE peralatan 
    SET 
      nama_alat = '$namaAlat'
    WHERE
      id_alat = $id_alat
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Peralatan.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
