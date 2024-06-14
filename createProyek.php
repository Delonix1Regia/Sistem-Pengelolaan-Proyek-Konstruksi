<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_proyek = $_POST['nama_proyek'];
  $id_klien = $_POST['id_klien'];
  $id_arsitek = $_POST['id_arsitek'];
  $id_kontraktor = $_POST['id_kontraktor'];
  $id_biaya = $_POST['id_biaya'];

  if (isset($_FILES['gambar_proyek']) && $_FILES['gambar_proyek']['error'] == 0) {
    $gambarProyek = $_FILES['gambar_proyek']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($gambarProyek);
    if (move_uploaded_file($_FILES['gambar_proyek']['tmp_name'], $targetFile)) {
      $gambarProyek = mysqli_real_escape_string($koneksi, $gambarProyek);
    } else {
      die('Error uploading file.');
    }
  } else {
    $gambarProyek = null;
  }

  $query = "INSERT INTO proyek (nama_proyek, id_klien, id_arsitek, id_kontraktor, id_biaya, gambar_proyek) VALUES ('$nama_proyek', '$id_klien', '$id_arsitek', '$id_kontraktor', '$id_biaya', '$gambarProyek')";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Proyek berhasil ditambahkan!'); window.location.href='Proyek.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Proyek.php';</script>";
  }
}
?>
