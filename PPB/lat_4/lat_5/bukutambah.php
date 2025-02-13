<?php
session_start();
include "./config_db.php";

$tampil = "SELECT * FROM books";

$hasil = $conn->query($tampil);

// // Periksa apakah pengguna sudah login dan memiliki role admin
// if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Books Table</title>
    <link rel="stylesheet" href="../assets-bs/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">DuniaBuku | Store</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Manajemen</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="">
            <button type="button" class="btn btn-outline-success" style="margin:20px 0px; ">Add Item</button>
        </a>

        <table class="table table-success table-striped">
            <thead class="table-dark">
                <tr >
                    <th>ID Buku</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($item = $hasil->fetch_assoc()): ?>

                    <tr >
                        <td > <?= $item['id_buku'] ?> </td>
                        <td> <?= $item['kode_buku'] ?> </td>
                        <td> <?= $item['judul'] ?> </td>
                        <td> <?= $item['pengarang'] ?> </td>
                        <td> <?= $item['penerbit'] ?> </td>
                        <td> <?= $item['harga'] ?> </td>
                        <td> <?= $item['stok'] ?> </td>

                        <td>
                            <a
                                href="http://localhost:8080/PPB/php/toko_buku_web/books_crud/update-books.php?id_buku=<?= $item['id_buku'] ?>"><button type="button" class="btn btn-info" style="color:white;">Edit</button></a>
                        </td>

                        <td>
                            <a
                                href="http://localhost:8080/PPB/php/toko_buku_web/books_crud/delete-books.php?id_buku=<?= $item['id_buku'] ?>  "><button type="button" class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="../assets-bs/bootstrap.js"></script>
</body>

</html>