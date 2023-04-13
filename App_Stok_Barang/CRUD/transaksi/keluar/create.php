<?php
include '../../../include/config.php';
session_start();

if(isset($_POST["submit"])) {
    $id_brg = $_POST["barang"];
    $jumlah = $_POST["jumlah"];
    $tgl = $_POST["tgl"];
    $users = $_SESSION['username'];

    include '../../../include/config.php';


    $sql = "INSERT INTO tb_transaksi_keluar (id_barang, jumlah_klr, username, tgl) VALUES ('$id_brg', '$jumlah', '$users', '$tgl')";
    if(mysqli_query($cn, $sql)) {
        $jumlah_old = mysqli_query($cn, "SELECT jumlah FROM tb_barang WHERE id_barang='$id_brg'");
        $jl = mysqli_fetch_assoc($jumlah_old);
        $jumlah_new = (int)$jl['jumlah'] - $jumlah;

        mysqli_query($cn, "UPDATE tb_barang SET jumlah='$jumlah_new' WHERE id_barang='$id_brg'");
        header("location: ../../../transaksi/keluar.php"); 
    }else{
            echo "Error Terjadi Kesalahan!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/Style.css">
    <title>Create</title>
</head>
<body>
<a href="../../../Login/login_berhasil_admin.php">Home</a>
<br>
    <form action="" method="post">
        <h3 class="title">Membuat Data Barang Keluar</h3>
        <label for="barang">Pilih Barang : </label>
        <select name="barang" id="barang" required>
        <?php
        include('../../../include/config.php');
            $hasil = mysqli_query($cn, "SELECT * FROM tb_barang");
            while($data = mysqli_fetch_assoc($hasil)){
        ?>
            <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
            <?php
            }
            ?>
        </select><br>
        <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Barang" required><br>
        <label for="tgl">Tanggal Barang Keluar : </label>
        <input type="date" name="tgl" id="tgl" required><br>
        <button name="submit">Buat</button>
    </form>
</body>
</html>