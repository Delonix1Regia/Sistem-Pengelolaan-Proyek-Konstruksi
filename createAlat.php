<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaAlat = $_POST['nama_alat'];
  
    $query = "INSERT INTO peralatan (nama_alat) VALUES ('$namaAlat')";
    $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      header('Location: Peralatan.php');
    } else {
      echo 'Error: ' . mysqli_error($koneksi);
    }
  }