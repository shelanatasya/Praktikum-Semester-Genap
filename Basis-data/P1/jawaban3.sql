-- Active: 1736687440739@@127.0.0.1@3306@trigger_siswa
CREATE DATABASE trigger_siswa;
use tringger_siswa;

CREATE table LogSiswa(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nis INTEGER,
    deksripsi VARCHAR(100),
    waktu TIMESTAMP
);

CREATE table siswa(
    nis INTEGER AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    alamat VARCHAR(100),
    no_telp VARCHAR(12),
    tanggal_lahir DATE
);

CREATE table LogHp(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nis INTEGER,
    no_telp_lama VARCHAR(12),
    no_telp_baru VARCHAR(13),
    waktu TIMESTAMP
);

DELIMITER $$

CREATE Trigger LogSiswa
AFTER INSERT
ON siswa
FOR EACH ROW
BEGIN
   INSERT INTO LogSiswa(nis,deksripsi,waktu) VALUES
   ()
END$$

