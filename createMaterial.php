<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_material = $_POST['nama_material'];
  $id_alat = $_POST['id_alat'];

  if (isset($_FILES['gambar_material']) && $_FILES['gambar_material']['error'] == 0) {
    $gambarMaterial = $_FILES['gambar_material']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarMaterial);
    if (move_uploaded_file($_FILES['gambar_material']['tmp_name'], $targetFile)) {
      $gambarMaterial = mysqli_real_escape_string($koneksi, $gambarMaterial);
    } else {
      die('Error uploading file.');
    }
  } else {
    $gambarMaterial = null;
  }

  $query = "INSERT INTO material (nama_material, id_alat, gambar_material) VALUES ('$nama_material', '$id_alat', '$gambarMaterial')";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Material berhasil ditambahkan!'); window.location.href='Material.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Material.php';</script>";
  }
}
