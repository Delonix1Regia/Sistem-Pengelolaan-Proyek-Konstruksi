<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_klien = $_POST['id_klien'];
  $nama_klien = $_POST['nama_klien'];

  $query = "
    UPDATE tugas 
    SET 
      nama_klien = '$nama_klien', 
    
    WHERE id_klien = $id_klien
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Klien.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
