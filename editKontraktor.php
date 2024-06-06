<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_kontraktor = $_POST['id_kontraktor'];
  $nama_kontraktor = $_POST['nama_kontraktor'];

  $query = "
    UPDATE tugas 
    SET 
      nama_kontraktor = '$nama_kontraktor', 
    
    WHERE id_kontraktor = $id_kontraktor
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Kontraktor.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
