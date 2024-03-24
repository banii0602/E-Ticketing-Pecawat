<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/e-ticketing/assets/style/sidebar.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/bootstrap.min.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/sweetalert.css">
    <style>
        .sidebar-admin {
    width: 200px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    background-color: #f5f5f5;
    border-right: 1px solid #ccc;
    padding: 24px;
    box-sizing: border-box;
  }
  
  .sidebar-admin a {
    display: block;
    padding: 8px 0;
    font-size: 16px;
    color: #333;
    text-decoration: none;
    border-bottom: 1px solid #ccc;
  }
  
  .sidebar-admin a:hover {
    background-color: #ddd;
  }
  
  .sidebar-admin a.active {
    background-color: #4CAF50;
    color: white;
  }

  h1 {
    margin-left: 250px;
  }

  .tambah {
    margin-left: 250px;
  }

  .tabel-data {
    margin-left: 250px;
  }

    </style>
    <title>Sidebar Admin</title>
</head>
<body>
    <div class="sidebar-admin">
        <a href="/e-ticketing/admin/index.php" class="<?php if($page == "Dashboard") echo "active" ?>">Dashboard</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/pengguna/" class="<?php if($page == "Pengguna") echo "active" ?>">Data Pengguna</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/maskapai/" class="<?php if($page == "Maskapai") echo "active" ?>">Data Maskapai</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/kota/" class="<?php if($page == "Kota") echo "active" ?>">Data Kota</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/rute/" class="<?php if($page == "Rute") echo "active" ?>">Data Rute</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/jadwal/" class="<?php if($page == "Jadwal") echo "active" ?>">Data Jadwal Penerbangan</a>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/order/" class="<?php if($page == "Tiket") echo "active" ?>">Pemesanan Tiket</a>&nbsp;&nbsp;
        <a href="/e-ticketing/logout.php" onClick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
    </div>
    <script src="/e-ticketing/assets/sweet-alert/js/jquery-2.1.4.min.js"></script>
    <script src="/e-ticketing/assets/sweet-alert/js/sweetalert.min.js"></script>
</body>
</html>