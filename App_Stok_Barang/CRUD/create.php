<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Create</title>
</head>
<body>
    
<a href="../Login/login_berhasil_admin.php">Home</a>
<br>
<form action="" method="post" enctype="Multipart/form-data">
    <h3 class="title">Membuat Data Barang</h3>
    <input type="text" name="nama_barang" placeholder="Input Nama Barang Anda"><br>
    <input type="text" name="harga" placeholder="Input Harga Barang Anda"><br>
    <input type="number" name="jumlah" placeholder="Input Jumlah Barang Anda"><br>
    <select name="kategori" id="kategori">
        <?php
        include('../include/config.php');
            $hasil = mysqli_query($cn, "SELECT * FROM tb_kategori");
            while($data = mysqli_fetch_assoc($hasil)){
        ?>
            <option value="<?= $data['id_kategori'] ?>"><?= $data['nama'] ?></option>
            <?php
            }
            ?>
    </select><br>
    <input type="file" name="gambar" id="gambar" required><br>
    <button name="submit">Buat</button>
</form>

</body>
</html>

<?php

if(isset($_POST["submit"])) {
    $nama = $_POST["nama_barang"];
    $harga = $_POST["harga"];
    $jumlah = $_POST["jumlah"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $lokasi = "../img/".$gambar;

    include '../include/config.php';

    $hasil = mysqli_query($cn, "INSERT INTO tb_barang(id_kategori, nama_barang, harga, gambar, jumlah) VALUES ('$kategori', '$nama', '$harga', '$gambar', $jumlah)");
    
    move_uploaded_file($gambar_tmp, $lokasi);

    header("Location: ../index.php");
    
}

?>