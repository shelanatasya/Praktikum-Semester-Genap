-- Active: 1736687440739@@127.0.0.1@3306@trigger_3_shela
CREATE DATABASE trigger_3_shela;
use trigger_3_shela;

CREATE table produk(
    kode_produk VARCHAR(50) PRIMARY KEY,
    deskripsi text(30),
    harga_beli INTEGER(60),
    harga_jual INTEGER(70),
    stok INTEGER(25)
);

CREATE table log_produk_harga(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(50),
    harga_beli INTEGER(80),
    harga_jual INTEGER(85),
    created_at DATE
);

CREATE table penjualan(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(50),
    tanggal DATE,
    jumlah INTEGER
);

INSERT INTO produk(kode_produk,deskripsi,harga_beli,harga_jual,stok) VALUES
('MAO-001','PERTAMINA 1L',45000,60000,5),
('MAO-002','FASTRON 1L',8000,110000,4),
('SAO-003','SHELL HELIX PREMIUM 1L',56000,72000,10),
('SAO-004','SHELL HELIX ULTRA 1L',120000,145000,5);

--4
DELIMITER $$

CREATE Trigger produk
BEFORE UPDATE
on log_harga_produk
FOR EACH ROW
BEGIN 
    UPDATE produk set harga_beli = NEW.harga_beli, harga_jual = NEW.harga_jual;
END

--5
DELIMITER$$
CREATE Trigger produk
BEFORE INSERT
on penjualan
FOR EACH ROW
BEGIN 
DECLARE stok INTEGER;
set stok = (select stok INTO stok produk WHERE kode_produk = NEW.kode_produk);
  if stok < NEW.stok THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = "stok tidak mencukupi";
   END if;
END$$

INSERT INTO produk(kode_produk,deskripsi,harga_beli,harga_jual,stok) VALUES
('MAO-001','PERTAMINA 1L',45000,60000,6),
