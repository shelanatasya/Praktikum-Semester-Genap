<?php
include "../template/config_db.php";

$query = "select * from books";
$books = $konek_db -> query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">">
    <link rel="stylesheet" href="../Asset/bootstrap.css">
</head>

<body>
    <?php include "../template/navbar.php"; ?>
    <div class="container">
        <h1 class="h3">Data Buku</h1>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>kode buku</th>
                    <th>judul</th>
                    <th>pengarang</th>
                    <th>penerbit</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $books->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['kode_buku'] ?></td>
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['pengarang'] ?></td>
                        <td><?= $data['penerbit'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['stok'] ?></td>
                        <td></td>
                    </tr>
                    <?php
                    $no++;
                endwhile;
                ?>