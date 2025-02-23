document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".auth-container").classList.add("show");
});




function calculatePrice() {
    let jumlahPeserta = document.getElementById('jumlah_peserta').value;
    let jumlahHari = document.getElementById('jumlah_hari').value;

    let hargaPaket = 0;
    if (document.getElementById('akomodasi').checked) {
        hargaPaket += 599000;
    }
    if (document.getElementById('transportasi').checked) {
        hargaPaket += 1500000;
    }
    if (document.getElementById('service').checked) {
        hargaPaket += 5999000;
    }

    document.getElementById('harga_paket').value = hargaPaket;

    let totalTagihan = jumlahPeserta * jumlahHari * hargaPaket;
    document.getElementById('total_tagihan').value = totalTagihan;
}

function validateForm() {
    let nama = document.getElementById('nama').value;
    let phone = document.getElementById('phone').value;
    let tanggalPesan = document.getElementById('tanggal_pesan').value;
    let jumlahPeserta = document.getElementById('jumlah_peserta').value;
    let jumlahHari = document.getElementById('jumlah_hari').value;

    if (!nama || !phone || !tanggalPesan || !jumlahPeserta || !jumlahHari) {
        alert("All fields must be filled in.");
        return false;
    }

    if (document.getElementById('harga_paket').value == 0) {
        alert("Please select at least one service to calculate the package price.");
        return false;
    }

    return true;
}
