<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_material = $_GET['id'];

    // Query untuk menghapus material berdasarkan ID
    $query = "DELETE FROM material WHERE id_material = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_material);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Material berhasil dihapus!'); window.location.href='Material.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Material.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('ID material tidak ditemukan.'); window.location.href='Material.php';</script>";
}

mysqli_close($koneksi);
