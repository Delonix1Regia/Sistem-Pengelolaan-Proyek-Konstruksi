<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_teknisi = $_POST['nama_teknisi'];
  $id_kontraktor = $_POST['id_kontraktor'];

  $query = "INSERT INTO teknisi (nama_teknisi, id_kontraktor) VALUES ('$nama_teknisi','$id_kontraktor')";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Teknisi berhasil ditambahkan!'); window.location.href='Teknisi.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Teknisi.php';</script>";
  }
}
