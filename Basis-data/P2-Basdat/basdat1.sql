-- Active: 1736687440739@@127.0.0.1@3306@tringger_jualan
CREATE DATABASE tringger_jualan;
use tringger_jualan;

CREATE table pelanggan(
    pelanggan_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(255),
    alamat TEXT,
    nomor_telepon VARCHAR(15)
);

CREATE table penjualan(
    penjualan_id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_penjualan DATE,
    total_harga DECIMAL(10,2),
    pelanggan_id INT,
    petugas_id INT
);

CREATE table detail_penjualan(
    detail_id INT,
    penjualan_id INT,
    produk_id INT,
    jumlah_produk INT,
    subtotal INT
);

CREATE table petugas(
    petugas_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_petugas VARCHAR(255),
    username VARCHAR(100),
    password VARCHAR(255),
    role ENUM("kepala toko","kasir")
);

CREATE table produk(
    produk_id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255),
    harga DECIMAL(10,2),
    stok INT
);

INSERT INTO pelanggan(pelanggan_id,nama_pelanggan,alamat,nomor_telepon) VALUES
(1,"John Doe","123 Main St, Springfield",555-1234),
(2,"Jane Smith","456 Elm St, Springfield",555-5678);

INSERT INTO petugas(petugas_id,nama_petugas,username,password,role) VALUES
(1,"Alice Johnson","alicej","password123","kepala toko"),
(2,"Bob Brown","bobb","password456","kasir");

INSERT INTO produk(produk_id,nama_produk,harga,stok) VALUES
(1,"Laptop",1500.00,10),
(2,"Smartphone",800.00,20);

INSERT INTO penjualan(penjualan_id,tanggal_penjualan,total_harga,pelanggan_id,petugas_id) VALUES
(1,2023-10-01,2300.00,1,2),
(2,2023-10-02,800.00,2,1);

INSERT INTO detail_penjualan(detail_id,penjualan_id,produk_id,jumlah_produk,subtotal) VALUES
(1,1,1,1,1500.00),
(2,1,2,1,800.00),
(3,2,2,1,800.00);


--1
SELECT SUM(subtotal) total_harga FROM detail_penjualan;

--2
