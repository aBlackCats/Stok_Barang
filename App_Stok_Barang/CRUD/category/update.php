<?php 

include("../../include/config.php");

$id = $_GET["id_kategori"];
if(isset($_POST["update"])) {
    //$id = $_GET['id_kategori'];
    $nama = $_POST['nama'];
    $ket = $_POST['ket'];

    $hasil = mysqli_query($cn, "UPDATE tb_kategori SET `nama` = '$nama', `ket` = '$ket' WHERE id_kategori = $id");
    header("Location: ../../category/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Style.css">
    <title>Update Data Kategori</title>
</head>
<body>
    <?php
    $hasil = mysqli_query($cn, "SELECT * FROM tb_kategori WHERE id_kategori = $id");
    while($data_brg = mysqli_fetch_array($hasil)) {
        $nama = $data_brg["nama"];
        $keterangan = $data_brg["ket"];
    }
    ?>
    <form action="" method="post">
        <h3 class="title">Edit Data Kategori</h3>
        <input type="text" name="nama" id="nama" value=<?php echo $nama ?>><br>
        <input type="text" name="ket" id="kat" value=<?php echo $keterangan ?>><br>
        <button name="update">Edit</button> <button><a href="../../category/index.php">Batal</a></button>
    </form>
</body>
</html>