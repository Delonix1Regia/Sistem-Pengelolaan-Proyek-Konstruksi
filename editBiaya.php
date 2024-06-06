<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_biaya = $_POST['id_biaya'];
  $jml_biaya = $_POST['jml_biaya'];

  $query = "
    UPDATE tugas 
    SET 
      jml_biaya = '$jml_biaya'
    
    WHERE id_biaya = $id_biaya
  ";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header('Location: Biaya.php');
  } else {
    echo 'Error: ' . mysqli_error($koneksi);
  }
}
?>
