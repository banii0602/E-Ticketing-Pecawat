<?php
$page = "Rute";

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

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai ORDER BY rute_asal");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<h1>Halaman Data Rute</h1>

<a class="tambah" href="tambah.php">Tambah</a>
<table class="tabel-data" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Maskapai</th>
        <th>Rute Asal</th>
        <th>Rute Tujuan</th>
        <th>Tanggal Pergi</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach($rute as $data) : ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $data["nama_maskapai"]; ?></td>
        <td><?= $data["rute_asal"]; ?></td>
        <td><?= $data["rute_tujuan"]; ?></td>
        <td><?= $data["tanggal_pergi"]; ?></td>
        <td>
            <a href="edit.php?id=<?= $data["id_rute"]; ?>">Edit</a>
            <a href="hapus.php?id=<?= $data["id_rute"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php $no++; ?>
    <?php endforeach; ?>
</table>
