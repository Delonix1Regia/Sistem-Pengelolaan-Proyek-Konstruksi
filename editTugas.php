<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_tugas = $_POST['id_tugas'];
  $nama_tugas = $_POST['nama_tugas'];
  $id_material = $_POST['id_material'];
  $id_proyek = $_POST['id_proyek'];
  $id_progress = $_POST['id_progress'];

  // Querynya belum ada id_proyek
  $query = "UPDATE tugas SET nama_tugas='$nama_tugas', id_material='$id_material', id_proyek='$id_proyek', id_progress='$id_progress' WHERE id_tugas='$id_tugas'";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Tugas berhasil diperbarui!'); window.location.href='Tugas.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Tugas.php';</script>";
  }
}
