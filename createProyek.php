<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_proyek = $_POST['nama_proyek'];
  $id_klien = $_POST['id_klien'];
  $id_arsitek = $_POST['id_arsitek'];
  $id_kontraktor = $_POST['id_kontraktor'];
  $id_biaya = $_POST['id_biaya'];

  $query = "INSERT INTO proyek (nama_proyek, id_klien, id_arsitek, id_kontraktor, id_biaya) VALUES ('$nama_proyek', '$id_klien', '$id_arsitek', '$id_kontraktor', '$id_biaya')";

  if (mysqli_query($koneksi, $query)) {
    header('Location: Proyek.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
