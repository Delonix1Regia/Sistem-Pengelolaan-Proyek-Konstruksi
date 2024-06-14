<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_klien = $_POST['nama_klien'];

  $query = "INSERT INTO klien (nama_klien) VALUES ('$nama_klien')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Klien.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
