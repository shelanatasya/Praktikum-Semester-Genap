<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}
$id_karyawan = $_GET['id_karyawan'];

//print_r( $data)

if(isset($_POST['id_karyawan'])){
    $nama_karyawan= $_POST['nama_karyawan'];
    $gaji_pokok = $_POST['gaji_pokok'];

    // siapkan query update
    $query ="UPDATE Karyawan SET nama_karyawan='$nama_karyawan' , gaji_pokok='$gaji_pokok' 
    WHERE id_jabatan = $id_jabatan";
    // eksekusi query update
    $hasil = $konek_db->query($query);
}
$jabatan = $konek_db->query("select * from karyawan where id_karyawan =$id_karyawan");
$data = $karyawan->fetch_assoc();
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
    <!-- form tambah jabatan -->
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
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?=$data['nama_karyawan']?>">
                </div>
            </div>
            <div class="mb-3  row">
                <label for="gaji_pokok" class="col-sm-2 col-form-label">gaji pokok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok"value="<?=$data['gaji_pokok']?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Simpan </button>
            <a href="http://localhost:8080/ppb/lat_2/jabatan/karyawan.php" class="btn btn-succes">Kembali</a>
            
  

        </form>
    </div>
    <!-- akhir form -->
    <script src="../Asset/bootstrap.js"></script>
</body>
</html>