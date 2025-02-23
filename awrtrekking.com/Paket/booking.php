<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <script src="../assets/js/validate.js"></script>
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">

    <div class="container">
        <div style="max-width: 600px; margin: 50px auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
            <h2 style="text-align: center; color: #007bff; font-weight: bold;">Booking Form</h2>

            <form action="proses.php" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="nama" style="font-weight: bold;">Name:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="phone" style="font-weight: bold;">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="paket_wisata" style="font-weight: bold;">Mount Package:</label>
                    <select class="form-control" id="paket_wisata" name="paket_wisata" required style="border-radius: 5px; padding: 10px;">
                        <option disabled selected><-- Choose --></option>
                        <option value="Kerinci Mount Package">Kerinci Mount Package</option>
                        <option value="Seemeru Mount Package">Semeru Mount Package</option>
                        <option value="Rinjani Mount Package">Rinjani Mount Package</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pesan" style="font-weight: bold;">Booking Date:</label>
                    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="jumlah_peserta" style="font-weight: bold;">Total Participant:</label>
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required oninput="calculatePrice()" style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="jumlah_hari" style="font-weight: bold;">Total Days:</label>
                    <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" required oninput="calculatePrice()" style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label style="font-weight: bold;">Accommodation:</label><br>
                    <div style="padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                        <input type="checkbox" id="akomodasi" name="akomodasi" value="1" onclick="calculatePrice()"> Entrance Ticket <strong>Rp 599.000</strong><br>
                        <input type="checkbox" id="transportasi" name="transportasi" value="1" onclick="calculatePrice()"> Tour Guide <strong>Rp 1.500.000</strong><br>
                        <input type="checkbox" id="service" name="service" value="1" onclick="calculatePrice()"> All-in Trip <strong>Rp 5.999.000</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga_paket" style="font-weight: bold;">Package Price:</label>
                    <input type="text" class="form-control" id="harga_paket" name="harga_paket" readonly style="background-color: #e9ecef; border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="total_tagihan" style="font-weight: bold;">Fee Total:</label>
                    <input type="text" class="form-control" id="total_tagihan" name="total_tagihan" readonly style="background-color: #e9ecef; border-radius: 5px; padding: 10px;">
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="padding: 12px; font-size: 16px; font-weight: bold; border-radius: 5px;">Submit</button>
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