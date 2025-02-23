<?php
session_start();
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("You must log in to view the orders.");
}

$id_user = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($role == 'admin') {
    $sql = "SELECT * FROM buku_tamu";
} else {
    $sql = "SELECT * FROM buku_tamu WHERE id_user = $id_user";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Edit - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">AWR Trekking</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Waiting List</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Paket/index.php">Mountain List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Modifikasi/index.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Dashboard/index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Auth/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Waiting List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <?php if ($role == 'admin'): ?>
                        <th>ID User</th>
                    <?php endif; ?>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date</th>
                    <?php if ($role == 'admin'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <?php if ($role == 'admin'): ?>
                                <td><?php echo $row['id_user']; ?></td>
                            <?php endif; ?>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <?php if ($role == 'admin'): ?>
                                <td>
                                    <a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data?')">Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12">There is no value</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div id="center_button">
            <button onclick="location.href='form_input.php'" class="btn btn-primary">Waiting List</button>
        </div>
        <br>
    </div>

    <footer class="footer-custom">
        <div class="container">
            <p>&copy; 2025 AWR Website. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/bootstrap/bootstrap.min.js"></script>

</body>

</html>

<?php $conn->close(); ?>