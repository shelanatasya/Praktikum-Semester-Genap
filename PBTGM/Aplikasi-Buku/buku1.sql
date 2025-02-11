-- Active: 1736687440739@@127.0.0.1@3306
CREATE DATABASE toko;
use toko;

CREATE table users(
    id_users INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(50),
    role ENUM('admin', 'kasir')
);

SELECT * FROM books;
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
    id_user INT
    
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

SELECT * FROM books

INSERT INTO books (kode_buku, judul, pengarang, penerbit, harga, stok) VALUES
('KB001', 'Pemrograman PHP untuk Pemula', 'John Doe', 'Pustaka Karya', 75000.00, 10),
('KB002', 'Belajar Python Dasar', 'Jane Smith', 'Tekno Media', 85000.00, 15),
('KB003', 'Panduan JavaScript Modern', 'Ali Ahmad', 'Cerdas Publishing', 90000.00, 8),
('KB004', 'Mengenal HTML dan CSS', 'Dewi Lestari', 'Media Cipta', 70000.00, 20),
('KB005', 'Kunci Sukses MySQL', 'Andi Wijaya', 'Pustaka Jaya', 95000.00, 5),
('KB006', 'Dasar-Dasar Jaringan Komputer', 'Rina Sari', 'Tekno Media', 60000.00, 12),
('KB007', 'Pengenalan Machine Learning', 'Budi Santoso', 'Cerdas Publishing', 110000.00, 9),
('KB008', 'Statistika untuk Pemula', 'Citra Lestari', 'Pustaka Ilmiah', 80000.00, 10),
('KB009', 'Desain Grafis dengan Photoshop', 'Andika Pratama', 'Media Kreatif', 75000.00, 18),
('KB010', 'Mahir Microsoft Excel', 'Siti Aminah', 'Pustaka Teknologi', 70000.00, 22),
('KB011', 'Pemrograman Java untuk Pemula', 'Ali Ahmad', 'Tekno Media', 85000.00, 14),
('KB012', 'Pengantar Sistem Operasi', 'Dewi Lestari', 'Ilmu Terapan', 65000.00, 16),
('KB013', 'Pemrograman C++ Modern', 'Budi Santoso', 'Cerdas Publishing', 90000.00, 11),
('KB014', 'Data Science untuk Semua', 'Citra Lestari', 'Pustaka Ilmiah', 115000.00, 7),
('KB015', 'Mengenal Database SQL', 'John Doe', 'Pustaka Jaya', 78000.00, 20),
('KB016', 'Pemrograman Python Lanjutan', 'Jane Smith', 'Tekno Media', 95000.00, 8),
('KB017', 'Panduan ReactJS', 'Andi Wijaya', 'Media Kreatif', 85000.00, 15),
('KB018', 'Belajar Angular Dasar', 'Rina Sari', 'Tekno Media', 92000.00, 9),
('KB019', 'Mahir Laravel Framework', 'Ali Ahmad', 'Cerdas Publishing', 88000.00, 13),
('KB020', 'Jaringan Wireless dan Keamanan', 'Budi Santoso', 'Ilmu Terapan', 100000.00, 6),
('KB021', 'Pengantar Teknologi Informasi', 'Citra Lestari', 'Pustaka Ilmiah', 70000.00, 18),
('KB022', 'Pemrograman Ruby', 'Andika Pratama', 'Media Kreatif', 77000.00, 11),
('KB023', 'Visualisasi Data dengan Python', 'Siti Aminah', 'Pustaka Teknologi', 87000.00, 10),
('KB024', 'Pemrograman Android', 'John Doe', 'Tekno Media', 93000.00, 12),
('KB025', 'Kecerdasan Buatan Dasar', 'Jane Smith', 'Cerdas Publishing', 120000.00, 9),
('KB026', 'Pengembangan Website dengan PHP', 'Ali Ahmad', 'Media Kreatif', 80000.00, 17),
('KB027', 'Pemrograman Swift untuk iOS', 'Dewi Lestari', 'Ilmu Terapan', 115000.00, 8),
('KB028', 'Manajemen Proyek IT', 'Budi Santoso', 'Pustaka Ilmiah', 65000.00, 20),
('KB029', 'Pemrograman Kotlin', 'Citra Lestari', 'Tekno Media', 98000.00, 10),
('KB030', 'Keamanan Siber untuk Pemula', 'Andika Pratama', 'Media Kreatif', 107000.00, 6),
('KB031', 'Pemrograman Shell Script', 'Siti Aminah', 'Pustaka Teknologi', 71000.00, 14),
('KB032', 'Dasar-Dasar Cloud Computing', 'John Doe', 'Tekno Media', 89000.00, 11),
('KB033', 'Pemrograman MATLAB', 'Jane Smith', 'Cerdas Publishing', 105000.00, 10),
('KB034', 'Machine Learning dengan R', 'Ali Ahmad', 'Media Kreatif', 112000.00, 7),
('KB035', 'Pengolahan Citra Digital', 'Dewi Lestari', 'Ilmu Terapan', 120000.00, 9),
('KB036', 'Pemrograman Scala', 'Budi Santoso', 'Pustaka Ilmiah', 87000.00, 10),
('KB037', 'Pemrograman Perl', 'Citra Lestari', 'Tekno Media', 95000.00, 8),
('KB038', 'Internet of Things Dasar', 'Andika Pratama', 'Media Kreatif', 86000.00, 12),
('KB039', 'Pemrograman Rust', 'Siti Aminah', 'Pustaka Teknologi', 93000.00, 14),
('KB040', 'Pemrograman Blockchain', 'John Doe', 'Tekno Media', 150000.00, 5),
('KB041', 'Pemrograman Haskell', 'Jane Smith', 'Cerdas Publishing', 91000.00, 10),
('KB042', 'Pengantar Big Data', 'Ali Ahmad', 'Media Kreatif', 89000.00, 11),
('KB043', 'Pemrograman Lua', 'Dewi Lestari', 'Ilmu Terapan', 87000.00, 8),
('KB044', 'Pemrograman Web dengan Django', 'Budi Santoso', 'Pustaka Ilmiah', 118000.00, 9),
('KB045', 'Belajar Flask Framework', 'Citra Lestari', 'Tekno Media', 97000.00, 10),
('KB046', 'Pemrograman Game dengan Unity', 'Andika Pratama', 'Media Kreatif', 130000.00, 7),
('KB047', 'Pemrograman dengan Visual Basic', 'Siti Aminah', 'Pustaka Teknologi', 72000.00, 15),
('KB048', 'Pemrograman Objective-C', 'John Doe', 'Tekno Media', 98000.00, 11),
('KB049', 'Panduan TensorFlow', 'Jane Smith', 'Cerdas Publishing', 110000.00, 8),
('KB050', 'Algoritma dan Struktur Data', 'Yusuf Idris', 'Ilmu Terapan', 120000.00, 12);
