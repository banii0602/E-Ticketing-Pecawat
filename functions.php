<?php

session_start();
require 'koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;    
}
function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM order_detail WHERE id_order_detail = '$id'");
    return mysqli_affected_rows($conn);
}

function edit($id){
    global $conn; 
    mysqli_query($conn, "UPDATE FROM order_detail WHERE id_order_detail = '$id'");
    return mysqli_affected_rows($conn);
}


function checkout($data){
    global $conn;

    $id_order = uniqid();
    $tanggal_transaksi = date('Y-m-d'); 
    $struk = bin2hex(random_bytes(10));
    $status = "Proses";
    $queryOrder = "INSERT INTO order_tiket VALUES ('$id_order', '$tanggal_transaksi', '$struk', '$status')";
    mysqli_query($conn, $queryOrder);

     foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) : ?>
        <?php $tiket = query("SELECT * FROM jadwal_penerbangan 
                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                        WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];
        $total_harga = $tiket["harga"] * $kapasitas;

        $id_user = $data["id_user"];
        $id_jadwal = $tiket["id_jadwal"];
        $jumlah_tiket = $kapasitas;
        $sisaKapasitas = $tiket["kapasitas_kursi"] - $kapasitas;
        $totalHarga = $total_harga;

        $queryOrderDetail = "INSERT INTO order_detail VALUES(NULL, '$id_user', '$id_jadwal', '$id_order', '$jumlah_tiket', '$totalHarga')";
        mysqli_query($conn, $queryOrderDetail);

        if($queryOrderDetail){
            $updateKapasitas = mysqli_query($conn, "UPDATE jadwal_penerbangan SET kapasitas_kursi = '$sisaKapasitas' WHERE id_jadwal = '$id_jadwal'");
        }

     endforeach;
     unset($_SESSION["cart"]);
     return true;
}
function getOrderDetail($id_order)
{
    global $conn;

    $query = "SELECT * FROM order_detail 
              INNER JOIN jadwal_penerbangan ON order_detail.id_jadwal = jadwal_penerbangan.id_jadwal
              INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
              INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai
              WHERE order_detail.id_order = '$id_order'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return null;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<di

?>