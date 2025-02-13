<?php 
$koneksi = mysqli_connect("localhost", "root","", "toko");
//check connection
if(mysqli_connect_errno()){
    echo "koneksi gagal :". mysqli_connect_error();
}


?>