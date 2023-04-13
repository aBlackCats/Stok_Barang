<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Style.css">
    <title>Create Category Data</title>
</head>
<body>
<a href="../../Login/login_berhasil_admin.php">Kembali</a>
    <form action="" method="post">
        <h3 class="title">Membuat Data Kategori</h3>
        <input type="text" name="nama" id="nama" placeholder="Input Nama Kategori" required><br>
        <input type="text" name="ket" id="ket" placeholder="Input Keterangan Kategori" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php 

include("../../include/config.php");

if(isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $ket = $_POST["ket"];

    $hasil = mysqli_query($cn, "INSERT INTO tb_kategori(nama, ket) VALUES ('$nama', '$ket')");
    header("Location: ../../category/index.php");
}

?>