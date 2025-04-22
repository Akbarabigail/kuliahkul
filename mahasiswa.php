<?php
$koneksi = new mysqli("localhost", "root", "", "kuliah");

// Create
if (isset($_POST['tambah'])) {
    $koneksi->query("INSERT INTO mahasiswa VALUES (
        '{$_POST['npm']}',
        '{$_POST['nama']}',
        '{$_POST['jurusan']}',
        '{$_POST['alamat']}'
    )");
}

// Delete
if (isset($_GET['hapus'])) {
    $koneksi->query("DELETE FROM mahasiswa WHERE npm='{$_GET['hapus']}'");
}

// Read
$data = $koneksi->query("SELECT * FROM mahasiswa");
?>

<h2>Data Mahasiswa</h2>
<form method="post">
    NPM: <input name="npm"><br>
    Nama: <input name="nama"><br>
    Jurusan:
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Operasi">Sistem Operasi</option>
    </select><br>
    Alamat: <input name="alamat"><br>
    <button name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
    <tr><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th><th>Aksi</th></tr>
    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['npm'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><a href="?hapus=<?= $row['npm'] ?>">Hapus</a></td>
        </tr>
    <?php } ?>
</table>
