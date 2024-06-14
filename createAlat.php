<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_alat = $_POST['nama_alat'];
  $id_alat = $_POST['id_alat'];

  if (isset($_FILES['gambar_alat']) && $_FILES['gambar_alat']['error'] == 0) {
    $gambarAlat = $_FILES['gambar_alat']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarAlat);
    if (move_uploaded_file($_FILES['gambar_alat']['tmp_name'], $targetFile)) {
      $gambarAlat = mysqli_real_escape_string($koneksi, $gambarMaterial);
    } else {
      die('Error uploading file.');
    }
  } else {
    $gambarAlat = null;
  }

  $query = "INSERT INTO peralatan (nama_alat, gambar_alat) VALUES ('$nama_alat', '$gambarAlat')";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Peralatan berhasil ditambahkan!'); window.location.href='Peralatan.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Peralatan.php';</script>";
  }
}
