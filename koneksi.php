<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "";     // Ganti dengan password database Anda
$database = "form_pemesanan"; // Ganti dengan nama database Anda

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
}
?>
