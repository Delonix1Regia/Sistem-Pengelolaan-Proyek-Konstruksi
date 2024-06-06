<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_material = $_POST['id_material'];
  $nama_material = $_POST['nama_material'];
  $id_alat = $_POST['id_alat'];

  $query = "
    UPDATE material 
    SET 
      nama_material = '$nama_material', 
      id_alat = '$id_alat'  
    WHERE id_material = $id_material
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Material.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
