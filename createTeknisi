<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_teknisi = $_POST['nama_teknisi'];
  $id_kontraktor = $_POST['id_kontraktor'];

  $query = "INSERT INTO teknisi (nama_teknisi, id_kontraktor) VALUES ('$nama_teknisi', '$id_kontraktor')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Teknisi.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
