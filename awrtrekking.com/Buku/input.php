<?php
session_start();
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("You must log in to place an order.");
}



$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tanggal'];

$id_user = $_SESSION['user_id'];
$sql = "INSERT INTO buku_tamu (id_user, nama, alamat, tanggal)
        VALUES ($id_user, '$nama', '$alamat', '$tanggal')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?status=success");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
