<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_arsitek = $_POST['nama_arsitek'];

  $query = "INSERT INTO tugas (nama_arsitek) VALUES ('$nama_arsitek')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Arsitek.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
