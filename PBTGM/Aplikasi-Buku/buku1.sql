-- Active: 1736687440739@@127.0.0.1@3306@toko
CREATE DATABASE toko;
use toko;

CREATE table users(
    id_users INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(50),
    role ENUM('admin', 'kasir')
);


INSERT INTO users(username,password,role) VALUES
('admin','admin','admin'),
('kasir','kasir','kasir');

CREATE table books(
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    kode_buku VARCHAR(30),
    judul VARCHAR(40),
    pengarang VARCHAR(20),
    penerbit VARCHAR(50),
    harga DECIMAL(10,2),
    stok INT
);

CREATE table transaction(
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_harga DECIMAL(15, 2),
    id_user INT,
    Foreign Key (id_user) REFERENCES users(id_user)
);

CREATE table transaction_details(
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_transaksi INT,
    id_buku int,
    jumlah INT,
    subtotal DECIMAL(15, 2),
    Foreign Key (id_transaksi) REFERENCES transactions(id_transaksi),
    Foreign Key (id_buku) REFERENCES books(id_buku)
);

CREATE table discounts(
    id_diskon INT AUTO_INCREMENT PRIMARY KEY,
    nama_diskon VARCHAR(100),
    deksripsi TEXT,
    jenis_diskon ENUM('peraentasi', 'nominal'),
    nilai_diskon DECIMAL(10, 2),
    minimal_pembelian DECIMAL(10, 2) DEFAULT 0,
    tanggal_mulai DATETIME,
    tanggal_selesai DATETIME,
    aktif BOOLEAN DEFAULT TRUE

);

INSERT INTO books(kode_buku,judul,pengarang,penerbit,harga,stok) VALUES
('0-22',"matahari","budi","ilham",'500000',20),
('1-23',"bunga","asep","akif",600000,'30');