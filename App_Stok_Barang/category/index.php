<?php

include("../include/config.php");
$hasil = mysqli_query($cn, "SELECT * FROM tb_kategori ORDER BY id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Table Kategori</title>
</head>
<body>
    <div class="navbar">
        <a href="../Login/login_berhasil_admin.php">Kembali</a>
        <a href="../CRUD/category/create.php">Tambah Data</a>
    </div>
    <table width = 80% border = 1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_kategori";
            $hasil = mysqli_query($cn, $sql);
            while($data_kategori = mysqli_fetch_array($hasil)) {
                echo "
                <tr>
                    <th>".$data_kategori['id_kategori']."</th>
                    <th>".$data_kategori['nama']."</th>
                    <th>".$data_kategori['ket']."</th>
                    <td><button><a href='../CRUD/category/update.php?id_kategori=$data_kategori[id_kategori]'>Edit</a></button><button><a href='../CRUD/category/delete.php?id_kategori=$data_kategori[id_kategori]'>Hapus</a></button></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>