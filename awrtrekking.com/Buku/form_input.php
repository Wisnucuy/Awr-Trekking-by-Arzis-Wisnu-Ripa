<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List Form - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">

    <div class="container">
        <div style="max-width: 500px; margin: 50px auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
            <h2 style="text-align: center; color: #007bff; font-weight: bold;"> Waiting List Form</h2>

            <form action="input.php" method="POST">
                <div class="form-group">
                    <label for="nama" style="font-weight: bold;">Name:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="alamat" style="font-weight: bold;">Address:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required style="border-radius: 5px; padding: 10px;">
                </div>

                <div class="form-group">
                    <label for="tanggal" style="font-weight: bold;">Date:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required style="border-radius: 5px; padding: 10px;">
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