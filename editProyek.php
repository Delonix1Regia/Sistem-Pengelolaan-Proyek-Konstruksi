<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_proyek = $_POST['id_proyek'];
  $nama_proyek = $_POST['nama_proyek'];
  $id_klien = $_POST['id_klien'];
  $id_arsitek = $_POST['id_arsitek'];
  $id_kontraktor = $_POST['id_kontraktor'];
  $id_biaya = $_POST['id_biaya'];

  $query = "UPDATE proyek SET nama_proyek='$nama_proyek', id_klien='$id_klien', id_arsitek='$id_arsitek', id_kontraktor='$id_kontraktor', id_biaya='$id_biaya' WHERE id_proyek='$id_proyek'";

  if (mysqli_query($koneksi, $query)) {
    header('Location: Proyek.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
