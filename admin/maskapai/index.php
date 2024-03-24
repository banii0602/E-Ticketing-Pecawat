<?php
$page = "Maskapai";

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '/e-ticketing/index.php';
    </script>
    ";
}

$maskapai = query("SELECT * FROM maskapai");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<h1>Halaman Maskapai</h1>

<a class="tambah" href="tambah.php">Tambah</a>
<table class="tabel-data"border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Logo</th>
        <th>Nama Maskapai</th>
        <th>Kapasitas</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach($maskapai as $data) : ?>
    <tr>
        <td><?= $no; ?></td>
        <td><img src="../../assets/images/<?= $data["logo_maskapai"]; ?>" width="80"></td>
        <td><?= $data["nama_maskapai"]; ?></td>
        <td style="text-align: center;"><?= $data["kapasitas"]; ?></td>
        <td>
            <a href="edit.php?id=<?= $data["id_maskapai"]; ?>">Edit</a>
            <a href="hapus.php?id=<?= $data["id_maskapai"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php $no++; ?>
    <?php endforeach; ?>
</table>
