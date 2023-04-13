<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <title>Home</title>
</head>
<body>
    <div class="navbar">
        <a href="Login/login_berhasil_admin.php">Kembali</a>
        <a href="CRUD/create.php">Tambah Data</a>
    </div>

    <table width=80% border = 1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        include("include/config.php");
            $no = 1;
            $sql = "SELECT * FROM tb_barang INNER JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori";
            $hasil = mysqli_query($cn, $sql);
            while($data_brg = mysqli_fetch_assoc($hasil)) {
            echo "
            <tbody>";
            echo"<tr>
                <td>".$data_brg['id_barang']."</td>
                <td>".$data_brg['nama_barang']."</td>
                <td>".$data_brg['harga']."</td>"; ?>
                <td style="text-align:center"><img src="img/<?php echo $data_brg['gambar'] ?>"width="100" height="120"></td>
                <?php echo "
                <td>".$data_brg['nama']."</td>
                <td>".$data_brg['jumlah']."</td>
                <td><button><a href='CRUD/update.php?id_barang=$data_brg[id_barang]'>Edit</a></button><button><a href='CRUD/delete.php?id_barang=$data_brg[id_barang]'>Hapus</a></button></td>
            </tr>
        </tbody>";
        }
        ?>
    </table>
    
</body>
</html>