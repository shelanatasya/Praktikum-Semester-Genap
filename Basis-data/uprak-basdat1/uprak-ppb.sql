-- Active: 1736687440739@@127.0.0.1@3306@uprak_genap
CREATE DATABASE uprak_genap;
use uprak_genap;

CREATE table user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(50),
    email VARCHAR(30),
    tanggal_lahir DATE,
    kata_sandi VARCHAR(50)
);

INSERT into user(nama_lengkap,email,tanggal_lahir,kata_sandi) VALUES
("natasya","natasyashela@gmail.com",'22-05-2006',"shelanatasya");


--DROP Table user;