-- Active: 1736687440739@@127.0.0.1@3306@nusantara
CREATE DATABASE nusantara;
use nusantara;

CREATE table user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50),
    nama_belakang VARCHAR(50),
    email VARCHAR(50),
    Password VARCHAR(50)
);

INSERT INTO user(Username,nama_belakang,email,Password) VALUES
("Shela","Natasya","natasyashela@gmail.com",'260624');

DROP table user;