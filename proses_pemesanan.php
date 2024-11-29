<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama_pemesan = $_POST['nama_pemesan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomer_identitas = $_POST['nomer_identitas'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $harga = $_POST['harga'];  // Data numerik dari hidden field
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $durasi_menginap = $_POST['durasi_menginap'];
    $total_bayar = $_POST['total_bayar'];  // Data numerik dari hidden field

    // Cek apakah termasuk_breakfast dipilih
    if (isset($_POST['termasuk_breakfast'])) {
        $termasuk_breakfast = $_POST['termasuk_breakfast'];  // Nilai 1 atau 0
    } else {
        $termasuk_breakfast = null;  // Tidak disimpan jika tidak dipilih
    }

    // Buat query untuk menyimpan data ke dalam database
    if ($termasuk_breakfast !== null) {
        $sql = "INSERT INTO pemesanan_hotel (nama_pemesan, jenis_kelamin, nomer_identitas, tipe_kamar, harga, tanggal_pesan, durasi_menginap, termasuk_breakfast, total_bayar)
                VALUES ('$nama_pemesan', '$jenis_kelamin', '$nomer_identitas', '$tipe_kamar', '$harga', '$tanggal_pesan', '$durasi_menginap', '$termasuk_breakfast', '$total_bayar')";
    } else {
        // Jika termasuk_breakfast tidak dipilih, simpan tanpa kolom tersebut
        $sql = "INSERT INTO pemesanan_hotel (nama_pemesan, jenis_kelamin, nomer_identitas, tipe_kamar, harga, tanggal_pesan, durasi_menginap, total_bayar)
                VALUES ('$nama_pemesan', '$jenis_kelamin', '$nomer_identitas', '$tipe_kamar', '$harga', '$tanggal_pesan', '$durasi_menginap', '$total_bayar')";
    }

    if (mysqli_query($koneksi, $sql)) {
        echo "Data pemesanan berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>