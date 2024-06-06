<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_kontraktor = $_POST['nama_kontraktor'];

  $query = "INSERT INTO tugas (nama_kontraktor) VALUES ('$nama_kontraktor')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Kontraktor.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
