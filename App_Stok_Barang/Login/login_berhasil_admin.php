<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>PLACEHOLDER</title>
</head>
<style>
    a {
        margin:0 4px;
    }
</style>
<body>
    <div class="navbar">
    <form action="" method="POST" class="login-email">
            <?php echo "<h1>Welcome, " . $_SESSION['username'] ."</h1>"; ?>
             
            <div class="input-group">
            <a href="../index.php">Table Barang</a>
            <a href="../category/index.php">Table Kategori</a>
            <a href="../transaksi/masuk.php">Table Brg Masuk</a>
            <a href="../transaksi/keluar.php">Table Brg Keluar</a>
            <a href="../CRUD/create.php">Tambah Data Barang</a>
            <a href="../CRUD/category/create.php">Tambah Data Kategori</a>
            <a href="../CRUD/transaksi/masuk/create.php">Tambah Data Brg Masuk</a>
            <a href="../CRUD/transaksi/keluar/create.php">Tambah Data Brg Keluar</a><br>
            <a href="logout.php" class="btn">Logout</a>
            </div>
        </form>
    </div>
</body>