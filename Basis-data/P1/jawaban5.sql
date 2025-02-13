-- Active: 1736687440739@@127.0.0.1@3306@trigger_perpustakaan3
CREATE DATABASE trigger_perpustakaan3;
use trigger_perpustakaan3;

CREATE table anggota(
    id_anggota BIGINT AUTO_INCREMENT PRIMARY KEY,
    kode_anggota CHAR(10),
    nama_lengkap VARCHAR(50),
    alamat text(100),
    no_telepon VARCHAR(13),
    jenis_kelamin ENUM("L","P")
);
--DROP Table anggota;

CREATE table buku(
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    kode_buku CHAR(5),
    judul_buku VARCHAR(50),
    penulis_buku VARCHAR(50),
    penerbit_buku VARCHAR(50),
    tahun_terbit YEAR,
    stok TINYINT(30)
);

CREATE table pengembalian(
    id_pengembalian INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_kembali DATE,
    jumlah_buku TINYINT(20),
    id_buku INT,
    id_anggota INT,
    denda BIGINT,
    id_peminjaman BIGINT
);

CREATE table peminjaman(
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_pinjam date,
    tanggal_kembali DATE,
    id_buku INT,
    id_anggota INT,
    jumlah_buku TINYINT(40)
);

INSERT INTO anggota(kode_anggota,nama_lengkap,alamat,no_telepon,jenis_kelamin) VALUES
('KB0-11',"Alfin alfiyan","subang","083837275442","Laki - laki"),
('KB2-33',"Silva","Purwakarta","081526275331","Perempuan");

INSERT INTO buku(kode_buku,judul_buku,penulis_buku,penerbit_buku,tahun_terbit,stok) VALUES
('KB3-44',"Matahari","Asep","Andre",'2002',5),
('KB6-55',"Bulan","Tono","Yaya",'1999',10);

--B
CREATE Trigger cek_peminjaman_buku
BEFORE INSERT
ON peminjaman
FOR EACH ROW
BEGIN   
    DECLARE jumlah_stok INT;
    SET jumlah_stok = (SELECT stok FROM buku WHERE id_buku = NEW.id_buku);
    IF jumlah_stok < NEW.jumlah_buku THEN
    SIGNAL SQLSTATE '45000'
    SET message_text = "Stok buku tidak cukup";
    END IF;

END

INSERT INTO peminjaman(tanggal_pinjam,tanggal_kembali,id_buku,id_anggota,jumlah_buku) VALUES
('22','30','055-888','066-999',15);

CREATE TRIGGER cek_buku
AFTER INSERT
ON peminjaman
FOR EACH ROW
BEGIN
    UPDATE buku SET stok = stok -1 WHERE id_buku = NEW.id_buku;
END
SELECT * from peminjaman;

