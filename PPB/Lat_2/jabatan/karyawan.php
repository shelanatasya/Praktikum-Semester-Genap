<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}

$karyawan = $konek_db->query("select * from karyawan");
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
        <h1 class="h3">Data karyawan</h1>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>id karyawan</th>
                    <th>nama</th>
                    <th>tanggal lahir</th>
                    <th>jenis kelamin</th>
                    <th>id jabatan</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $karyawan->fetch_assoc()):
                    ?>
                    <tr>
                        
                        <td><?= $data['id_karyawan'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['tanggal_lahir']?></td>
                        <td><?= $data['jenis_kelamin']?></td>
                        <td><?= $data['id_jabatan']?></td>
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