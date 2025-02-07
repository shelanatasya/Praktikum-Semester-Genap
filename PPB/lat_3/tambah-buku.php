<?php
include "../template/config_db.php";

$query = "select * from transaction";
$transaction = $konek_db -> query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <?php include "../template/navbar.php"; ?>
    <div class="container">
        <h1 class="h3">Data transaction</h1>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>tanggal</th>
                    <th>total harga</th>
                    <th>id user</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $transaction->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['total_harga'] ?></td>
                        <td><?= $data['id_user'] ?></td>
                        <td></td>
                    </tr>
                    <?php
                    $no++;
                endwhile;
                ?>