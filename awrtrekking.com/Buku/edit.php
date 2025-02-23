<?php
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$id = $_POST['id'];
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tanggal'];


$sql = "UPDATE buku_tamu SET nama='$nama', alamat='$alamat', tanggal='$tanggal' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
