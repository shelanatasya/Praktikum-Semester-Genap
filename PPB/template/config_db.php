<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "toko");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}
?>