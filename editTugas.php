<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_tugas = $_POST['id_tugas'];
  $nama_tugas = $_POST['nama_tugas'];
  $id_material = $_POST['id_material'];
  $id_proyek = $_POST['id_proyek'];
  $id_progress = $_POST['id_progress'];

  $query = "
    UPDATE tugas 
    SET 
      nama_tugas = '$nama_tugas', 
      id_material = '$id_material', 
      id_proyek = '$id_proyek', 
      id_progress = '$id_progress' 
    WHERE id_tugas = $id_tugas
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Tugas.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
