<?php
$koneksi = new mysqli("localhost", "root", "", "kuliah");

$query = "SELECT 
    m.nama AS nama_mahasiswa,
    mk.nama AS nama_matkul,
    mk.jumlah_sks,
    CONCAT(m.nama, ' Mengambil Mata Kuliah ', mk.nama, ' (', mk.jumlah_sks, ' SKS)') AS keterangan
FROM krs k
JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";

$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Data KRS</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Mata Kuliah</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_mahasiswa']}</td>
                <td>{$row['nama_matkul']}</td>
                <td>{$row['keterangan']}</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
