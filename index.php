<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Pemesanan Hotel</title>
</head>

<body>
    <header>
        <h1>Pemesanan Hotel</h1>
    </header>

    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="#">Pesanan Hotel</a>
            </div>
            <ul class="menu">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#form">Pesan Kamar</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <!-- Paket Best Seller Section -->
        <section id="best-seller">
            <h2>Tipe-Tipe Kamar</h2>
            <div class="paket kasur item">
                <img src="gambar 1.jpg" alt="Paket Kamar Standar" />
                <p>Paket 1 - Kamar Standar</p>
                <button>Detail</button>
            </div>

            <br />

            <div class="paket kasur item">
                <img src="gambar 2.jpg" alt="Paket Kamar Deluxe" />
                <p>Paket 2 - Kamar Deluxe</p>
                <button>Detail</button>
            </div>

            <br />

            <div class="paket kasur item">
                <img src="gambar 3.jpg" alt="Paket Kamar Familly" />
                <p>Paket 3 - Kamar Familly</p>
                <button>Detail</button>
            </div>
        </section>

        <!-- Video Promosi -->
        <section id="video-promosi">
            <h2>Video Hotel</h2>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bbrvE5BOD9s?si=cyRxzxN7Gp8etEGG"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>

        <!-- Tabel Daftar Harga -->
        <section id="daftar-harga">
            <h2>Daftar Harga Kamar</h2>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Kamar</th>
                        <th>Harga per Malam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kamar Standar</td>
                        <td>Rp 500.000</td>
                    </tr>
                    <tr>
                        <td>Kamar Deluxe</td>
                        <td>Rp 800.000</td>
                    </tr>
                    <tr>
                        <td>Kamar Familly</td>
                        <td>Rp 1.200.000</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Tentang Kami Section -->
        <section id="tentang-kami">
            <h2>Tentang Kami</h2>
            <p>Hotel Apita terletak di pusat kota Cirebon, dengan akses mudah ke berbagai lokasi strategis. Kami
                menyediakan fasilitas modern dan layanan terbaik untuk memastikan kenyamanan Anda selama menginap.</p>
            <p>
                Alamat: Jl. Tuparev No.323, Kedawung, Kec. Kedawung, Kabupaten Cirebon, Jawa Barat 45153<br />
                No. Telp: (021) 123-4567<br />
                Email: info@hotelapita.com
            </p>
        </section>
    </main>

    <!-- Form Pemesanan Kamar -->
    <section id="pesan-kamar">
        <h3>Form Pemesanan Kamar</h3>
        <br />
        <form name="form_pemesanan" method="post" action="proses_pemesanan.php" onsubmit="return validateForm()">
            <table>
                <!-- Input Nama Pemesan -->
                <tr>
                    <td><label for="nama_pemesan">Nama Pemesan:</label></td>
                    <td><input type="text" id="nama_pemesan" name="nama_pemesan" required /></td>
                </tr>

                <!-- Input Jenis Kelamin -->
                <tr>
                    <td><label>Jenis Kelamin:</label></td>
                    <td>
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required />
                        <label for="laki-laki">Laki-Laki</label>
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required />
                        <label for="perempuan">Perempuan</label>
                    </td>
                </tr>

                <!-- Input Nomer Identitas -->
                <tr>
                    <td><label for="nomer_identitas">Nomer Identitas:</label></td>
                    <td><input type="number" id="nomer_identitas" name="nomer_identitas" required /></td>
                </tr>

                <!-- Input Tipe Kamar -->
                <tr>
                    <td><label for="tipe_kamar">Tipe Kamar:</label></td>
                    <td>
                        <select id="tipe_kamar" name="tipe_kamar" required onchange="updateHarga()">
                            <option value="" disabled selected>Pilih Tipe Kamar</option>
                            <option value="Standar">Standar</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Eksekutif">Familly</option>
                        </select>
                    </td>
                </tr>

                <!-- Input Harga (readonly, tidak dapat diubah pengguna) -->
                <tr>
                    <td><label for="harga">Harga:</label></td>
                    <td>
                        <input type="text" id="harga_display" name="harga_display" readonly />
                        <input type="hidden" id="harga_numeric" name="harga" /> <!-- Hidden untuk harga numerik -->
                    </td>
                </tr>

                <!-- Input Tanggal Pesan -->
                <tr>
                    <td><label for="tanggal_pesan">Tanggal Pesan:</label></td>
                    <td><input type="date" id="tanggal_pesan" name="tanggal_pesan" required /></td>
                </tr>

                <!-- Input Durasi Menginap -->
                <tr>
                    <td><label for="durasi_menginap">Durasi Menginap:</label></td>
                    <td><input type="number" id="durasi_menginap" name="durasi_menginap" min="1" required /></td>
                </tr>

                <!-- Input Termasuk Breakfast -->
                <tr>
                    <td><label for="termasuk_breakfast">Termasuk Breakfast:</label></td>
                    <td>
                        <select id="termasuk_breakfast" name="termasuk_breakfast" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="1">Ya</option> <!-- Nilai 1 jika ya -->
                            <option value="0">Tidak</option> <!-- Nilai 0 jika tidak -->
                        </select>
                    </td>
                </tr>

                <!-- Input Total Bayar -->
                <tr>
                    <td><label for="total_bayar">Total Bayar:</label></td>
                    <td><input type="text" id="total_bayar_display" name="total_bayar_display" readonly />
                        <input type="hidden" id="total_bayar_numeric" name="total_bayar" />
                        <!-- Hidden untuk total bayar numerik -->
                    </td>
                </tr>
            </table>

            <!-- Tombol Hitung Total Bayar dan Simpan -->
            <div class="button-group">
                <button type="button" onclick="hitungTotal()">Hitung Total Bayar</button>
                <button type="submit">Pesan Hotel</button>
                <button type="button" onclick="document.forms['form_pemesanan'].reset();">Batal</button>
            </div>
        </form>
    </section>


    <script src="main.js"></script>
</body>

</html>