<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_material = $_POST['id_material'];
  $nama_material = $_POST['nama_material'];
  $id_alat = $_POST['id_alat'];

  if ($_FILES['edit_gambar_material']['name']) {
    $gambarMaterial = $_FILES['edit_gambar_material']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarMaterial);
    move_uploaded_file($_FILES['edit_gambar_material']['tmp_name'], $targetFile);

    $query = "UPDATE material SET nama_material='$nama_material', id_alat='$id_alat', gambar_material='$gambarMaterial' WHERE id_material='$id_material'";
  } else {
    $query = "UPDATE material SET nama_material='$nama_material', id_alat='$id_alat' WHERE id_material='$id_material'";
  }

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Material berhasil diperbarui!'); window.location.href='Material.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Material.php';</script>";
  }
}
