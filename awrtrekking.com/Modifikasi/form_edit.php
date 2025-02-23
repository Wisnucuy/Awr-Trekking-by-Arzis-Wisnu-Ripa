<?php
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM pesanan WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Edit - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <script src="../assets/js/validate.js"></script>
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">

    <div class="container">
        <div style="max-width: 600px; margin: 50px auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
            <h2 style="text-align: center; color: #007bff; font-weight: bold;">Booking Edit</h2>

            <form action="edit.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label for="nama" style="font-weight: bold;">Name:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="phone" style="font-weight: bold;">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="paket_wisata" style="font-weight: bold;">Mount Package:</label>
                    <select class="form-control" id="paket_wisata" name="paket_wisata" required style="border-radius: 5px; padding: 10px;">
                        <option disabled><-- Choose --></option>
                        <option value="Kerinci Mount Package" <?php if ($row['paket_wisata'] == "Kerinci Mount Package") echo "selected"; ?>>Kerinci Mount Package</option>
                        <option value="Semeru Mount Package" <?php if ($row['paket_wisata'] == "Semeru Mount Package") echo "selected"; ?>>Semeru Mount Package</option>
                        <option value="Rinjani Mount Package" <?php if ($row['paket_wisata'] == "Rinjani Mount Package") echo "selected"; ?>>Rinjani Mount Package</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pesan" style="font-weight: bold;">Booking Date:</label>
                    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" value="<?php echo $row['tanggal_pesan']; ?>" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="jumlah_peserta" style="font-weight: bold;">Total Participants:</label>
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $row['jumlah_peserta']; ?>" required oninput="calculatePrice()" style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="jumlah_hari" style="font-weight: bold;">Total Days:</label>
                    <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="<?php echo $row['jumlah_hari']; ?>" required oninput="calculatePrice()" style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label style="font-weight: bold;">Accommodation:</label><br>
                    <div style="padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                        <input type="checkbox" id="akomodasi" name="akomodasi" value="1" <?php if ($row['akomodasi']) echo 'checked'; ?> onclick="calculatePrice()"> Entrance Ticket <strong>Rp 599.000</strong><br>
                        <input type="checkbox" id="transportasi" name="transportasi" value="1" <?php if ($row['transportasi']) echo 'checked'; ?> onclick="calculatePrice()"> Tour Guide <strong>Rp 1.500.000</strong><br>
                        <input type="checkbox" id="service" name="service" value="1" <?php if ($row['service']) echo 'checked'; ?> onclick="calculatePrice()"> All-in Trip <strong>Rp 5.999.000</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga_paket" style="font-weight: bold;">Package Price:</label>
                    <input type="text" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo $row['harga_paket']; ?>" readonly style="background-color: #e9ecef; border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="total_tagihan" style="font-weight: bold;">Fee Total:</label>
                    <input type="text" class="form-control" id="total_tagihan" name="total_tagihan" value="<?php echo $row['total_tagihan']; ?>" readonly style="background-color: #e9ecef; border-radius: 5px; padding: 10px;">
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="padding: 12px; font-size: 16px; font-weight: bold; border-radius: 5px;">Update</button>
            </form>
        </div>
    </div>

    <footer style="text-align: center; margin-top: 20px; padding: 15px; background-color: #007bff; color: white;">
        &copy; 2025 AWR Trekking. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/bootstrap/bootstrap.min.js"></script>

</body>

</html>