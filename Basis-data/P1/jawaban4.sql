-- Active: 1736687440739@@127.0.0.1@3306@toko_barang
CREATE DATABASE toko_barang;
use toko_barang;

CREATE table barang(
    id_barang VARCHAR(30) AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(50),
    stok INT(70) 
);
DROP table barang:

CREATE table pembelian(
    id_pembelian VARCHAR(40) AUTO_INCREMENT PRIMARY KEY,
    id_barang INT,
    jumlah_pembelian int(100)
);
INSERT INTO barang(id_barang,nama_barang,stok) VALUES
('A10',"mouse",10),
('A11',"keyboard",15),
('A12',"DVD-RW",19);

INSERT INTO pembelian(id_pembelian,id_barang,jumlah_pembelian) VALUES
(1,'A10',5);

INSERT INTO pembelian(id_barang,jumlah_pembelian) VALUES
('A10',20);

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

CREATE Trigger cek_stok_barang
BEFORE INSERT
ON pembelian
FOR EACH ROW
BEGIN
   -- siapkan variabel jumlah stok untuk menyimpan jumlah stok barang
   DECLARE jumlah_stok INT;
   -- ambil jumlah stok barang dari table_barang
   -- cara 1 : menggunakan set
   SET jumlah_stok = (SELECT stok FROM barang WHERE id_barang = NEW.id_barang);
   -- cara 2 : menggunakan select into
   -- SELECT stok INTO jumlah_stok FROM barang WHERE id_barang = NEW. id_barang;
   -- cek apakah jumlah stok barang cukup
   IF jumlah_stok < NEW.jumlah_pembelian THEN
      -- jika tidak cukup, maka batalkan INSERT
      SIGNAL SQLSTATE '45000'
      -- kirim pesan ERROR
      SET message_text = "Stok barang tidak cukup";

   END IF;

END

-- DROP Trigger cek_stok_barang;
show TRIGGERS