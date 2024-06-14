<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_alat = $_POST['id_alat'];
  $nama_alat = $_POST['nama_alat'];

  if ($_FILES['edit_gambar_alat']['name']) {
    $gambarAlat = $_FILES['edit_gambar_alat']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarAlat);
    move_uploaded_file($_FILES['edit_gambar_alat']['tmp_name'], $targetFile);

    $query = "UPDATE peralatan SET nama_alat='$nama_alat', gambar_alat='$gambarAlat' WHERE id_alat='$id_alat'";
  } else {
    $query = "UPDATE peralatan SET nama_alat='$nama_alat' WHERE id_alat='$id_alat'";
  }

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Peralatan berhasil diperbarui!'); window.location.href='Peralatan.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Peralatan.php';</script>";
  }
}
