<?php
include 'koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == 'in') {
    $query1 = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
    $h_1 = $koneksi->query($query1);
    if (mysqli_num_rows($h_1) == 1) {
        $d_1 = $h_1->fetch_array();
        $_SESSION['username'] = $d_1['username'];
        $_SESSION['level'] = $d_1['level'];
        if ($d_1['level'] == "Admin") {
            header("location:Proyek.php");
        } else if ($d_1['level'] == "User") {
            header("location:ProyekKlien.php");
        } else {
            echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                         </div> <br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button>";
        }
    }
} else if ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("location:login.php");
}
