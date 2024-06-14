<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jml_biaya = $_POST['jml_biaya'];

  $query = "INSERT INTO biaya (jml_biaya) VALUES ('$jml_biaya')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Biaya.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
