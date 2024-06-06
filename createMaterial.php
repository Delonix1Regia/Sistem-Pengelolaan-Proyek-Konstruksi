<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_material = $_POST['nama_material'];
  $id_alat = $_POST['id_alat'];

  $query = "INSERT INTO material (nama_material, id_alat) VALUES ('$nama_material', '$id_alat')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Material.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
    