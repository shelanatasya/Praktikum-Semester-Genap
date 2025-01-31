<?php 

// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "praktikum2");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}
// simpan id jabatan yang dikirim
$id_karyawan = $_GET ["id_karyawan"];

//jalankan query hapus
$query = "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan";
$konek_db->query($query);

//pindahkan halaman ke halaman tampil jabatan
header("location:http://localhost:8080/ppb/lat_2/jabatan/karyawan.php");

?>