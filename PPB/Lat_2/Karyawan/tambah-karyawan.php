<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}
// MEMBUAT QUERY UNTUK MENAMBAH DATABASE
if (isset($_POST['nama_karyawan'])) { // PILIH SALAH SATU NAMA INPUT DARI FORM
    // PLAIN TEXT QUERY
    $nama_jabatan = $_POST['nama_karyawan'];
    $id_karyawan =$_POST['id_karyawan'];

// MENJALANKAN QUERY
    $hasil = $konek_db->query(query: "INSERT INTO karyawan(nama_karyawan,id_karyawan)   
    VALUES('$nama_karyawan ','$id_karyawan')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data karyawan</title>
    <link rel="stylesheet" href="../Asset/bootstrap.css">
</head>
<body>
    <!-- form tambah karyawan -->
    <?php if (isset($hasil)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>data berhasil masuk</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="nama_karyawan" class="col-sm-2 col-form-label">nama karyawan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
                </div>
            </div>
            <div class="mb-3  row">
                <label for="id_karyawan" class="col-sm-2 col-form-label">id karyawan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="" name="id_karyawan">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Simpan </button>
        </form>
    </div>
    <!-- akhir form -->
    <script src="../Asset/bootstrap.js"></script>
</body>
</html>