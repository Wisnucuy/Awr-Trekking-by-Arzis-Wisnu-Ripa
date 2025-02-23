<?php
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
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

$sql = "UPDATE pesanan SET nama='$nama', phone='$phone', paket_wisata='$paket_wisata', tanggal_pesan='$tanggal_pesan', jumlah_peserta=$jumlah_peserta, jumlah_hari=$jumlah_hari, akomodasi=$akomodasi, transportasi=$transportasi, service=$service, harga_paket='$harga_paket', total_tagihan='$total_tagihan' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
