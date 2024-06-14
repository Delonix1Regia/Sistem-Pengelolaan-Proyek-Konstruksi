<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_proyek = $_GET['id'];

    // Query untuk menghapus material berdasarkan ID
    $query = "DELETE FROM proyek WHERE id_proyek = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_proyek);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Proyek berhasil dihapus!'); window.location.href='Material.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "'); window.location.href='Proyek.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('ID Proyek tidak ditemukan.'); window.location.href='Proyek.php';</script>";
}

mysqli_close($koneksi);
