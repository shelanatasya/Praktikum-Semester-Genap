-- Active: 1736687440739@@127.0.0.1@3306@toko_barang
CREATE DATABASE toko_barang;
use toko_barang;

CREATE table barang(
    id_barang INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(50),
    stok INT(70) 
);

CREATE table pembelian(
    id_pembelian INT AUTO_INCREMENT PRIMARY KEY,
    id_barang INT,
    jumlah_pembelian int(100)
);
INSERT INTO barang(id_barang,nama_barang,stok) VALUES
('A10',"mouse",10),
('A11',"keyboard",15),
('A12',"DVD-RW",19);

INSERT INTO pembelian(id_pembelian,id_barang,jumlah_pembelian) VALUES
(1,'A10',5);

DELIMITER $$

CREATE TRIGGER inkremenstok
BEFORE INSERT on barang
FOR EACH ROW
BEGIN 
SET
    NEW.stok = NEW.stok +1;
END $$

INSERT INTO barang(id_barang,nama_barang,stok) VALUES
('A13',"modem",5);

select * FROM barang;


