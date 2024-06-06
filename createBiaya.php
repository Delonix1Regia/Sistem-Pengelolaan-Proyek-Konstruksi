<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jml_klien = $_POST['jml_klien'];

  $query = "INSERT INTO tugas (jml_klien) VALUES ('$jml_klien')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Biaya.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
