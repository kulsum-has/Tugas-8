CREATE TABLE IF NOT EXISTS mobil (
    id_mobil INT AUTO_INCREMENT PRIMARY KEY,
    merk VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    tahun_produksi SMALLINT,
    warna VARCHAR(30),
    harga DECIMAL(10, 2),
    stok INT
);

CREATE TABLE IF NOT EXISTS pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100) NOT NULL,
    alamat TEXT,
    nomor_telepon VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_mobil INT,
    id_pelanggan INT,
    tanggal_transaksi DATE NOT NULL,
    jumlah_beli INT NOT NULL,
    total_harga DECIMAL(12, 2) NOT NULL,
    FOREIGN KEY (id_mobil) REFERENCES mobil(id_mobil),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

INSERT INTO mobil (merk, model, tahun_produksi, warna, harga, stok) VALUES
('Toyota', 'Avanza', 2022, 'Silver', 220000000.00, 5);