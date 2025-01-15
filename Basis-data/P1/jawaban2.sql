-- Active: 1736687440739@@127.0.0.1@3306@rekap_absensi
CREATE DATABASE rekap_absensi;
use rekap_absensi;

CREATE Table karyawan(
    id BIGINT PRIMARY KEY,
    nama VARCHAR(100),
    no_hp VARCHAR(12),
    jabatan VARCHAR(10)
);

CREATE table absensi(
    id BIGINT PRIMARY KEY,
    tanggal DATE,
    karyawan_id BIGINT,
    Foreign Key (karyawan_id) REFERENCES karyawan(id)
);

CREATE table rekap(
    id INT PRIMARY KEY,
    karyawan_id BIGINT,
    jumlah_hari INT,
    Foreign Key (karyawan_id) REFERENCES karyawan(id)
);

INSERT INTO karyawan(id,nama,no_hp,jabatan) VALUES
(1,"sodikin",0812124563,"direktur"),
(2,"melati",0813131452,"manager");

INSERT INTO rekap(id,karyawan_id,jumlah_hari) VALUES
(1,1,0),
(2,2,0);

DELIMITER $$

--1
CREATE TRIGGER tambah_hari_rekap
AFTER INSERT
ON absensi
FOR EACH ROW
BEGIN
    UPDATE rekap set jumlah_hari = jumlah_hari + 1 WHERE karyawan_id = NEW.karyawan_id; 
END$$
DELIMITER ;

INSERT INTO absensi(id,tanggal,karyawan_id)
VALUES
(1,'2022-01-01',1);

SELECT * FROM rekap;
--2
DELIMITER $$
CREATE Trigger kurang_hari_rekap
AFTER DELETE
on absensi
FOR EACH ROW
BEGIN
   UPDATE rekap set jumlah_hari = jumlah_hari - 1 where karyawan_id = OLD.karyawan_id;
END$$
DELIMITER $$

