<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_proyek = $_POST['id_proyek'];
  $nama_proyek = $_POST['nama_proyek'];
  $id_klien = $_POST['id_klien'];
  $id_arsitek = $_POST['id_arsitek'];
  $id_kontraktor = $_POST['id_kontraktor'];
  $id_biaya = $_POST['id_biaya'];

  if ($_FILES['edit_gambar_proyek']['name']) {
    $gambarProyek = $_FILES['edit_gambar_proyek']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarProyek);
    move_uploaded_file($_FILES['edit_gambar_proyek']['tmp_name'], $targetFile);

    $query = "UPDATE proyek SET nama_proyek='$nama_proyek', id_klien='$id_klien', id_arsitek='$id_arsitek', id_kontraktor='$id_kontraktor', id_biaya='$id_biaya', gambar_proyek='$gambarProyek' WHERE id_proyek='$id_proyek'";
  } else {
    $query = "UPDATE proyek SET nama_proyek='$nama_proyek', id_klien='$id_klien', id_arsitek='$id_arsitek', id_kontraktor='$id_kontraktor', id_biaya='$id_biaya' WHERE id_proyek='$id_proyek'";
  }

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Proyek berhasil diperbarui!'); window.location.href='Proyek.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Proyek.php';</script>";
  }
}
