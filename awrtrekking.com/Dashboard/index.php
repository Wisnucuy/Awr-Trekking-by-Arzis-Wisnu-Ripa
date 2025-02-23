<?php
session_start();
$conn = new mysqli("localhost", "root", "", "awr_trekking");

if ($conn->connect_error) {
    die("Connection failed:  " . $conn->connect_error);
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("<div style='text-align:center; font-family:Arial, sans-serif; margin-top:50px;'>
            <h2 style='color: red;'>Access Denied!</h2>
            <p>This page is only for admin and you're not an admin cuh</p>
            <a href='../index.php' style='text-decoration:none; padding:10px 20px; background:#007bff; color:white; border-radius:5px;'>Login</a>
        </div>");
}

$tahun_sekarang = date("Y");
$tahun_pilihan = isset($_GET['tahun']) ? (int) $_GET['tahun'] : $tahun_sekarang;

$sql = "SELECT MONTH(tanggal_pesan) AS bulan, SUM(total_tagihan) AS pendapatan 
        FROM pesanan 
        WHERE YEAR(tanggal_pesan) = ? 
        GROUP BY MONTH(tanggal_pesan)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tahun_pilihan);
$stmt->execute();
$result = $stmt->get_result();

$data_pendapatan = array_fill(1, 12, 0);

while ($row = $result->fetch_assoc()) {
    $data_pendapatan[$row['bulan']] = $row['pendapatan'];
}

$labels = json_encode(["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"]);
$data_values = json_encode(array_values($data_pendapatan));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AWR Trekking</title>
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="home.php">AWR Trekking</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Buku/index.php">Waiting List</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Mountain List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Modifikasi/index.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Dashboard/index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Auth/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="max-width: 1100px; margin: 30px auto;">
        <form method="GET" action="">
            <label for="tahun">Year: </label>
            <select name="tahun" id="tahun" onchange="this.form.submit()">
                <?php
                for ($i = $tahun_sekarang; $i >= $tahun_sekarang - 5; $i--) {
                    $selected = ($tahun_pilihan == $i) ? "selected" : "";
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>
        </form>

        <h3 style="text-align: center; color: #343a40;">Revenue Chart for <?php echo $tahun_pilihan; ?></h3>

        <div style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <canvas id="chartPendapatan"></canvas>
        </div>

        <h3 style="text-align: center; color: #343a40; margin-top: 30px;">Revenue Table for <?php echo $tahun_pilihan; ?></h3>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th style="padding: 10px; text-align: center;">Month</th>
                        <th style="padding: 10px; text-align: center;">Total Revenue (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bulan_nama = ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"];
                    foreach ($data_pendapatan as $bulan => $pendapatan) {
                        echo "<tr style='background-color: " . ($bulan % 2 == 0 ? "#f2f2f2" : "white") . ";'>
                                <td style='padding: 10px; text-align: center;'>{$bulan_nama[$bulan - 1]}</td>
                                <td style='padding: 10px; text-align: center;'>Rp " . number_format($pendapatan, 0, ',', '.') . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('chartPendapatan').getContext('2d');
        var chartPendapatan = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo $labels; ?>,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: <?php echo $data_values; ?>,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <footer class="footer-custom">
        <div class="container">
            <p>&copy; 2025 AWR Website. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
</body>

</html>