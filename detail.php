<?php require 'layouts/navbar.php'; ?>
<?php 
if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '/e-ticketing/index.php';
    </script>
    ";
}


$id = $_GET["id"];
$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];
?>
 

<div class="list-tiket-pesawat">
    <h1>Jadwal Penerbangan - E Ticketing</h1>
    <div class="wrapper-detail-tiket-pesawat">
        <div class="logo-maskapai"><img src="assets/images/<?= $jadwalPenerbangan["logo_maskapai"] ; ?>" alt=""></div>
        <div class="nama-maskapai">Nama Maskapai : <?= $jadwalPenerbangan["nama_maskapai"] ; ?></div>
        <div class="rute-asal">Rute Aasal : <?= $jadwalPenerbangan["rute_asal"] ; ?></div>
        <div class="rute-tujuan">Rute Tujuan : <?= $jadwalPenerbangan["rute_tujuan"] ; ?></div>
        <div class="tanggal-berangkat">Tanggal Berangkat : <?= $jadwalPenerbangan["tanggal_pergi"] ; ?></div>
        <div class="waktu-berangkat">Waktu Berangkat : <?= $jadwalPenerbangan["waktu_berangkat"] ; ?></div>
        <div class="waktu-tiba">Waktu Tiba : <?= $jadwalPenerbangan["waktu_tiba"] ; ?></div>
        <div class="harga-tiket">Harga : Rp <?= number_format($jadwalPenerbangan["harga"]) ; ?></div>
        <div class="kapasitas">Kapasitas : <?= $jadwalPenerbangan["kapasitas_kursi"] ; ?></div>

        <form action="" method="POST">
            <input type="number" name="qty" value="1">
            <button type="submit" name="pesan">Pesan</button>
        </form>
    </div>
</div>

<?php 

if(isset($_POST["pesan"])){
    if($_POST["qty"] > $jadwalPenerbangan["kapasitas_kursi"]){
        echo "
            <script type='text/javascript'>
            alert('Mohon maaf kuantitas yang kamu pesna melibihi kuantitas yang tersedia')
            window.location = 'index.php'
            </script>
        ";
    }else if($_POST["qty"] <= 0){
        echo "
            <script type='text/javascript'>
            alert('Beli setidaknya 1 tiket ya!')
            window.location = 'index.php'
            </script>
        ";
    }else{
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;
        echo "
            <script type='text/javascript'>
            window.location = 'cart.php'
            </script>
        ";
    }
}

?>