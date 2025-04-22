
CREATE DATABASE kuliah;
USE kuliah;

CREATE TABLE mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi'),
    alamat TEXT
);

CREATE TABLE matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50),
    jumlah_sks INT(3)
);

CREATE TABLE krs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm),
    FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk)
);

INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES
('001', 'Siska Putri', 'Teknik Informatika', 'Jl. Mawar'),
('002', 'Ujang Aziz', 'Sistem Operasi', 'Jl. Melati'),
('003', 'Veronica Setyano', 'Teknik Informatika', 'Jl. Anggrek'),
('004', 'Rizka Nurmala Putri', 'Sistem Operasi', 'Jl. Kamboja'),
('005', 'Eren Putra', 'Teknik Informatika', 'Jl. Kenanga'),
('006', 'Putra Abdul Rachman', 'Teknik Informatika', 'Jl. Teratai'),
('007', 'Rahmat Andriyadi', 'Teknik Informatika', 'Jl. Dahlia'),
('008', 'Ayu Puspitasari', 'Sistem Operasi', 'Jl. Flamboyan'),
('009', 'Putri Ayuni', 'Sistem Operasi', 'Jl. Bougenville'),
('010', 'Andri Muhammad', 'Sistem Operasi', 'Jl. Cemara');

INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Berbasis Web', 3),
('MK003', 'Algoritma dan Struktur Data', 3),
('MK004', 'Kajian Jurnal Informatika', 2);

INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES
('001', 'MK001'),
('002', 'MK002'),
('003', 'MK001'),
('004', 'MK003'),
('005', 'MK004'),
('006', 'MK001'),
('007', 'MK001'),
('008', 'MK002'),
('009', 'MK002'),
('010', 'MK003');
