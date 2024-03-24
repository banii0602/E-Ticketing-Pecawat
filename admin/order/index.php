<?php
$page = "Tiket";

require 'functions.php';
session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '/e-ticketing/index.php';
    </script>
    ";
}

$orderTiket = query("SELECT * FROM order_tiket")

?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<h1>Data Pemesanan Tiket</h1>
<table class="tabel-data" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nomor Order</th>
        <th>Struk</th>
        <th>Status</th>
        <th>Opsi</th>
    </tr>
    <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td>
            <?php 
                if($data["status"] == "proses"){
                    ?>
                    <a href="update_status.php?id=<?= $data["id_order"]; ?>" style="color: blue; text-decoration: none;">Proses</a>
                    <?php
                } else if($data["status"] == "berhasil"){
                    ?>
                    <a href="" style="color: green; text-decoration: none;">Berhasil</a>
                    <?php
                } else if($data["status"] == "gagal"){
                    ?>
                    <a href="" style="color: red; text-decoration: none;">Gagal</a>
                    <?php
                }
            ?>
            </td>
            <td>
            <?php if ($data["status"] == "proses") : ?>
                <button class="btn"><a href="verif.php?id=<?= $data["id_order"]; ?>">Verifikasi</a></button>
                <a href="reject.php?id=<?= $data["id_order"]; ?>">Reject</a>
            <?php elseif ($data["status"] == "berhasil" || $data["status"] == "gagal") : ?>
                <a href="hapus.php?id=<?= $data["id_order"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>