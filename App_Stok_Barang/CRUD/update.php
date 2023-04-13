<?php

include("../include/config.php");

$id = $_GET["id_barang"];
if(isset($_POST["Update"])) {
    // $id = $_GET["id"];
    $name = $_POST["nama_barang"];
    $harga = $_POST["harga"];
    $jumlah = $_POST["jumlah"];
    $kategori = $_POST["kategori"];
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_baru = date('dmYHis').$gambar;
    $lokasi = "../img/".$gambar_baru;
    move_uploaded_file($gambar_baru, $lokasi);

    if(move_uploaded_file($gambar_tmp, $lokasi)) {
        $query = mysqli_query($cn, "SELECT * FROM tb_barang WHERE id_barang = $id");
        $data = mysqli_fetch_array($query);
        if(is_file("../img/".$data['gambar']))
            unlink("../img/".$data['gambar']);
    }
        
    
    $hasil = mysqli_query($cn, "UPDATE `tb_barang` SET `id_kategori` = '$kategori', `nama_barang`= '$name',`harga`= '$harga', `jumlah`= '$jumlah', `gambar`= '$gambar_baru' WHERE id_barang = '$id'");
    header("Location: ../index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Update</title>
</head>
<body style="text-align:center;">
<?php

    $hasil = mysqli_query($cn, "SELECT * FROM tb_barang WHERE id_barang = $id");
    while($data_brg = mysqli_fetch_array($hasil)) {
        // echo '<pre>';
        // var_dump($data_brg);
        // echo '</pre>';
        $kategori = $data_brg["id_kategori"];
        $name = $data_brg["nama_barang"];
        $harga = $data_brg["harga"];
        $jumlah = $data_brg["jumlah"];
        $gambar = $data_brg["gambar"];
    }
?>
    <form action="" method="post" enctype="Multipart/form-data">
        <h3 class="title">Edit Data Barang</h3>
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value=<?php echo $name; ?>><br>
        <label for="harga">Harga Barang</label>
        <input type="number" name="harga" value=<?php echo $harga; ?>><br>
        <label for="jumlah">Jumlah Barang</label>
        <input type="number" name="jumlah" value=<?php echo $jumlah; ?>><br>
        <label for="id_kategori">Kategori Barang</label>
        <select name="kategori" id="kategori" value=<?php echo $kategori; ?>>
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
        <img src="../img/<?php echo $gambar ?>"width="100" height="120" style="border-radius:8px; margin: 5px"><br>
        <input type="file" name="gambar" f>
        <input type="hidden" name="id_barang" value=<?php  echo $_GET['id_barang'];?>><br>
        
        <button type="submit" name="Update">Edit</button> <button><a href="../index.php">Batal</a></button>
    </form>
</body>
</html>


