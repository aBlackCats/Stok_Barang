<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>CREATE</title>
</head>
<body>
<div class="navbar">
        <a href="../Login/login_berhasil_admin.php">Kembali</a>
        <a href="../CRUD/masuk/create.php">Tambah Data</a>
    </div>

<table width = 40% border = 1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Username</th>
            <th>Tgl</th>
        </tr>
    </thead>

<?php
    include("../include/config.php");
    $no = 1;
    $sql = "SELECT * FROM ((tb_transaksi_masuk INNER JOIN tb_barang ON tb_transaksi_masuk.id_barang = tb_barang.id_barang) INNER JOIN tb_user ON tb_transaksi_masuk.username = tb_user.username)";
    $hasil = mysqli_query($cn, $sql);
    while($data = mysqli_fetch_assoc($hasil)) {
?>

    <tbody>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['jumlah_msk'] ?></td>
            <td><?php echo $data['harga'] ?></td>
            <td><?php echo $data['username'] ?></td>
            <td><?php echo $data['tgl'] ?></td>
        </tr>
    </tbody>
    <?php } ?>
</table>

</body>
</html>