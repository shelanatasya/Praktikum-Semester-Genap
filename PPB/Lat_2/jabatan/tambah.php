<?php
// 1.membuat koneksi ke database
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// 2.periksa koneksi ke database
if ($konek_db->connect_error) {
    die("Koneksi gagal:" . $konek_db->connect_error);
}
// 3.membuat query untuk menambah data
if (isset($_POST['nama_jabatan'])) { // pilih salah satu nama input dari form
    // plain text query
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];

    // jalankan query
    $hasil = $konek_db->query("INSERT INTO jabatan(nama_jabatan,gaji_pokok) VALUES('$nama_jabatan', $gaji_pokok)");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.css">
</head>

<body>
    <!-- form tambah jabatan  -->
    <?php if (isset($hasil)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil ditambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="nama_jabatan" class="col-sm-2 col-form-label">nama jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gaji_pokok" class="col-sm-2 col-form-label">gaji pokok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok">
                </div>
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>


    </div>
    <!-- akhir form -->


    <script src="../assets/bootsrap.js"></script>
</body>

</html>