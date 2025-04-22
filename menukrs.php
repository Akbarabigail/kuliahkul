<?php
$koneksi = new mysqli("localhost", "root", "", "kuliah");

$mahasiswa = $koneksi->query("SELECT * FROM mahasiswa");
$matakuliah = $koneksi->query("SELECT * FROM matakuliah");

if (isset($_POST['tambah'])) {
    $koneksi->query("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (
        '{$_POST['npm']}', '{$_POST['kodemk']}'
    )");
}

if (isset($_GET['hapus'])) {
    $koneksi->query("DELETE FROM krs WHERE id='{$_GET['hapus']}'");
}

$data = $koneksi->query("SELECT k.id, m.nama AS nama_mahasiswa, mk.nama AS nama_matkul, mk.jumlah_sks,
    CONCAT(m.nama, ' Mengambil Mata Kuliah ', mk.nama, ' (', mk.jumlah_sks, ' SKS)') AS keterangan
    FROM krs k
    JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
    JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk");
?>

<h2>Data KRS</h2>
<form method="post">
    Mahasiswa:
    <select name="npm">
        <?php while ($m = $mahasiswa->fetch_assoc()) echo "<option value='{$m['npm']}'>{$m['nama']}</option>"; ?>
    </select>
    Mata Kuliah:
    <select name="kodemk">
        <?php while ($mk = $matakuliah->fetch_assoc()) echo "<option value='{$mk['kodemk']}'>{$mk['nama']}</option>"; ?>
    </select>
    <button name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
    <tr><th>No</th><th>Nama</th><th>Mata Kuliah</th><th>Keterangan</th><th>Aksi</th></tr>
    <?php $no=1; while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_mahasiswa'] ?></td>
            <td><?= $row['nama_matkul'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td><a href="?hapus=<?= $row['id'] ?>">Hapus</a></td>
        </tr>
    <?php } ?>
</table>
