<?php
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM buku_tamu WHERE id=$id";
$result = $conn->query($sql);
$row = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List Edit - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <script src="../assets/js/validate.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            background: #007bff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .alert {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Waiting List Edit</h2>

        <?php if (!$row): ?>
            <div class="alert">Data not found!</div>
        <?php else: ?>
            <form action="edit.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="nama">Name:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Address:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Date:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal'] ?? ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/bootstrap/bootstrap.min.js"></script>
</body>

</html>