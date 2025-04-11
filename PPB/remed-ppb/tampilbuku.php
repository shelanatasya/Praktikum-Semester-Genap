<?php 
include "config_db.php";

// ambil data buku
$query = "SELECT * FROM books";
$buku = $konek_db->query($query);
$listbuku = [];
$book = mysqli_fetch_assoc($buku);
$listbuku[] = $book;    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
    <?php include "../template/navbar.php";?>
    <div class="container">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>kode buku</th>
                    <th>judul</th>
                    <th>penerbit</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>subtotal</th>
                    <th>stok</th>
                    <th>tambah</th>
                    <th>edit</th>
                    <th>hapus</th>
                    
                </tr>
                <tr>
                    <td>
                    <?php while ($item = $buku->fetch_assoc()): ?>
                        <tr>
                        <td > <?= $item['id_buku'] ?> </td>
                        <td> <?= $item['kode_buku'] ?> </td>
                        <td> <?= $item['judul'] ?> </td>
                        <td> <?= $item['pengarang'] ?> </td>
                        <td> <?= $item['penerbit'] ?> </td>
                        <td> <?= $item['harga'] ?> </td>
                        <td> <?= $item['stok'] ?> </td>
                        </tr>
                    <?php endwhile;?>
                    </td>

                </tr>
            </thead>

        </table>

    </div>
    
</body>
</html>