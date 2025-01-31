<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}

$jabatan = $konek_db->query("select * from jabatan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Asset/bootstrap.css">
</head>

<body>
    <div class="container">
        <h1 class="h3">Data Jabatan</h1>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $jabatan->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['nama_jabatan'] ?></td>
                        <td><?= $data['gaji_pokok'] ?></td>
                        <td></td>
                    </tr>
                    <?php
                    $no++;
                endwhile;
                ?>
             <a href="http://localhost:8080/ppb/lat_2/jabatan/edit.php=?=$data['id_jabatan']?>">Edit</a>
             <a href="http://localhost:8080/ppb/lat_2/jabatan/edit.php=?$data['id_jabatan']?>">hapus</a>



            </tbody>
        </table>
    </div>
</body>

</html>