<?php
// Menyertakan file koneksi ke database
include 'koneksi.php';

// Query untuk mendapatkan semua data dari tabel pemesanan_hotel
$sql = "SELECT * FROM pemesanan_hotel";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam tabel HTML
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Jenis Kelamin</th>
            <th>Nomer Identitas</th>
            <th>Tipe Kamar</th>
            <th>Harga</th>
            <th>Tanggal Pesan</th>
            <th>Durasi Menginap</th>
            <th>Termasuk Breakfast</th>
            <th>Total Bayar</th>
          </tr>";

    // Output data dari setiap baris
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id_pemesanan'] . "</td>
                <td>" . $row['nama_pemesan'] . "</td>
                <td>" . $row['jenis_kelamin'] . "</td>
                <td>" . $row['nomer_identitas'] . "</td>
                <td>" . $row['tipe_kamar'] . "</td>
                <td>" . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>" . $row['tanggal_pesan'] . "</td>
                <td>" . $row['durasi_menginap'] . "</td>
                <td>" . ($row['termasuk_breakfast'] == 1 ? 'Ya' : 'Tidak') . "</td>
                <td>" . number_format($row['total_bayar'], 0, ',', '.') . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data pemesanan.";
}

// Menutup koneksi
mysqli_close($koneksi);
?>