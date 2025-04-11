<?php
// MEMBUAT KONEKSI KE DATABASE
$konek_db = new mysqli("localhost", "root", "", "toko");
// PERIKSA KONEKSI KE DATABASE  
if ($konek_db->connect_error) {
    die("Koneksi Gagal : " . $konek_db->connect_error);
}
$id_buku = $_GET['id_buku'];

//print_r( $data)

if(isset($_POST['id_buku'])){
    $judul= $_POST['judul'];
    $pengarang = $_POST['pengarang'];

    // siapkan query update
    $query ="UPDATE books SET judul='$judul' , pengarang='$pengarang' 
    WHERE penerbit = $penerbit";
    // eksekusi query update
    $hasil = $konek_db->query($query);
}
$buku = $konek_db->query("select * from books where id_buku =$id_buku");
$data = $books->fetch_assoc();
?>

