<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_biaya = $_POST['id_biaya'];
  $jml_biaya = $_POST['jml_biaya'];

  $query = "UPDATE biaya SET jml_biaya = '$jml_biaya' WHERE id_biaya = $id_biaya";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Biaya berhasil diperbarui!'); window.location.href='Biaya.php';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Biaya.php';</script>";
  }
}
