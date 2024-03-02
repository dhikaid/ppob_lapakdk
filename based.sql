CREATE TABLE kategori(
    id_kategori CHAR(10) NOT NULL PRIMARY KEY,
    nama_kategori CHAR(100) NOT NULL,
    detail CHAR(255) NOT NULL
);


CREATE TABLE produk(
    id_produk CHAR(10) NOT NULL PRIMARY KEY,
    nama_jns CHAR(100) NOT NULL,
    detail CHAR(255) NOT NULL,
    harga INT NOT NULL
);

CREATE TABLE detail_transaksi(
    id_dtransaksi CHAR(10) NOT NULL PRIMARY KEY,
    id_produk CHAR(10) NOT NULL,
    qty INT NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

CREATE table jenis_pembayaran(
    id_pembayaran CHAR(10) NOT NULL PRIMARY KEY,
    nama_pembayaran CHAR(100) NOT NULL
);


CREATE TABLE transaksi(
    invoice CHAR(10) NOT NULL PRIMARY KEY,
    id_dtransaksi CHAR(10) NOT NULL,
    id_pembayaran CHAR(10) NOT NULL,
    FOREIGN KEY (id_dtransaksi) REFERENCES detail_transaksi(id_dtransaksi),
    FOREIGN KEY (id_pembayaran) REFERENCES jenis_pembayaran(id_pembayaran)
);

CREATE TABLE users(
    uuid CHAR(255) NOT NULL PRIMARY KEY,
    username CHAR(100) NOT NULL,
    email CHAR(255) NOT NULL,
    password CHAR(255) NOT NULL,
    nohp CHAR(15) NOT NULL,
    gambar CHAR(200) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
);