function updateHarga() {
  const form = document.forms["form_pemesanan"];
  const tipeKamar = form["tipe_kamar"].value;

  let hargaPerMalam = 0;

  // Tentukan harga per malam berdasarkan tipe kamar
  if (tipeKamar === "Standar") {
    hargaPerMalam = 500000;
  } else if (tipeKamar === "Deluxe") {
    hargaPerMalam = 800000;
  } else if (tipeKamar === "Eksekutif") {
    hargaPerMalam = 1200000;
  }

  // Simpan harga dalam format numerik
  form["harga_numeric"].value = hargaPerMalam;

  // Set harga di input yang ditampilkan (format mata uang)
  form["harga_display"].value = hargaPerMalam.toLocaleString("id-ID", {
    style: "currency",
    currency: "IDR",
    maximumFractionDigits: 0,
  });
}

function hitungTotal() {
  const form = document.forms["form_pemesanan"];
  const tipeKamar = form["tipe_kamar"].value;
  const durasiMenginap = parseInt(form["durasi_menginap"].value) || 0;
  const termasukBreakfast = form["termasuk_breakfast"].value; // 1 jika ya, 0 jika tidak
  const hargaPerMalam = parseInt(form["harga_numeric"].value) || 0;
  const persenDiskon = 10;
  const biayaBreakfastPerMalam = 80000; // Tambahan biaya sarapan per malam

  let totalBayar = 0;

  if (hargaPerMalam > 0 && durasiMenginap > 0) {
    totalBayar = hargaPerMalam * durasiMenginap;

    // Tambahan biaya breakfast sesuai dengan durasi menginap jika dipilih (1 = Ya)
    if (termasukBreakfast === "1") {
      totalBayar += biayaBreakfastPerMalam * durasiMenginap; // Sarapan dihitung per malam
    }

    // Diskon jika menginap lebih dari 3 malam
    if (durasiMenginap > 3) {
      let jumlahDiskon = (persenDiskon / 100) * totalBayar;
      totalBayar -= jumlahDiskon;
    }

    // Simpan total bayar dalam format numerik
    form["total_bayar_numeric"].value = totalBayar;

    // Update field total bayar yang ditampilkan (format mata uang)
    form["total_bayar_display"].value = totalBayar.toLocaleString("id-ID", {
      style: "currency",
      currency: "IDR",
      maximumFractionDigits: 0,
    });
  } else {
    form["total_bayar_display"].value = "Rp0";
    form["total_bayar_numeric"].value = "0";
  }
}
