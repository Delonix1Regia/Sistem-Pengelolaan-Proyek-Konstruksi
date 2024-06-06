<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_teknisi = $_POST['id_teknisi'];
  $nama_teknisi = $_POST['nama_teknisi'];
  $id_kontraktor = $_POST['id_kontraktor'];

  $query = "
    UPDATE teknisi 
    SET 
      nama_teknisi = '$nama_teknisi', 
      id_kontraktor = '$id_kontraktor'  
    WHERE id_teknisi = $id_teknisi
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Teknisi.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
