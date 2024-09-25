CREATE DATABASE db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    alamat TEXT
);