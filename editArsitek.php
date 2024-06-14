<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_arsitek = $_POST['id_arsitek'];
  $nama_arsitek = $_POST['nama_arsitek'];

  $query = "
    UPDATE arsitek 
    SET 
      nama_arsitek = '$nama_arsitek'
    
    WHERE id_arsitek = $id_arsitek
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Arsitek.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
