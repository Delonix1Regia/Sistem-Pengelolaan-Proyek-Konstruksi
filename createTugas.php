<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_tugas = $_POST['nama_tugas'];
  $id_material = $_POST['id_material'];
  $id_proyek = $_POST['id_proyek'];
  $id_progress = $_POST['id_progress'];

  $query = "INSERT INTO tugas (nama_tugas, id_material, id_proyek, id_progress) VALUES ('$nama_tugas', '$id_material', '$id_proyek', '$id_progress')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Tugas.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
