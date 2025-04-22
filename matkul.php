<?php
$koneksi = new mysqli("localhost", "root", "", "kuliah");

if (isset($_POST['tambah'])) {
    $koneksi->query("INSERT INTO matakuliah VALUES (
        '{$_POST['kodemk']}',
        '{$_POST['nama']}',
        '{$_POST['sks']}'
    )");
}

if (isset($_GET['hapus'])) {
    $koneksi->query("DELETE FROM matakuliah WHERE kodemk='{$_GET['hapus']}'");
}

$data = $koneksi->query("SELECT * FROM matakuliah");
?>

<h2>Data Mata Kuliah</h2>
<form method="post">
    Kode MK: <input name="kodemk"><br>
    Nama: <input name="nama"><br>
    SKS: <input name="sks" type="number"><br>
    <button name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
    <tr><th>Kode</th><th>Nama</th><th>SKS</th><th>Aksi</th></tr>
    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['kodemk'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jumlah_sks'] ?></td>
            <td><a href="?hapus=<?= $row['kodemk'] ?>">Hapus</a></td>
        </tr>
    <?php } ?>
</table>
