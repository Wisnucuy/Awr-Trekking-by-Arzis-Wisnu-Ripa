<?php
session_start();
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("You must log in to view orders.");
}

$nama = $_POST['nama'];
$phone = $_POST['phone'];
$paket_wisata = $_POST['paket_wisata'];
$tanggal_pesan = $_POST['tanggal_pesan'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$jumlah_hari = $_POST['jumlah_hari'];
$akomodasi = isset($_POST['akomodasi']) ? 1 : 0;
$transportasi = isset($_POST['transportasi']) ? 1 : 0;
$service = isset($_POST['service']) ? 1 : 0;
$harga_paket = $_POST['harga_paket'];
$total_tagihan = $_POST['total_tagihan'];

$id_user = $_SESSION['user_id'];

$sql = "INSERT INTO pesanan (id_user, nama, phone, paket_wisata, tanggal_pesan, jumlah_peserta, jumlah_hari, akomodasi, transportasi, service, harga_paket, total_tagihan)
        VALUES ($id_user, '$nama', '$phone', '$paket_wisata', '$tanggal_pesan', $jumlah_peserta, $jumlah_hari, $akomodasi, $transportasi, $service, '$harga_paket', '$total_tagihan')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?notif=success");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
