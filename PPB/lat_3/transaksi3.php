<?php
// Connect to MySQL database
$conn = new mysqli("localhost", "root", "", "toko");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all data from the 'transaction' table
$query = "SELECT * FROM transaction";
$hasil = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Data</title>
    <link rel="stylesheet" href="./assets/bootstrap.css">
</head>
<body>
    <div class="container">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th>no</th>
                    <th>tanggal</th>
                    <th>id user</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Fetch each row and display the data
                while ($dataa = $hasil ->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $dataa['tanggal'] ?></td>
                        <td><?= $dataa['id_user'] ?></td>
                        <td><?= $dataa['total_harga'] ?></td>
                    </tr>
                <?php
                $no++;
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

    <script src="../assets/bootsrap.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
