<?php

include("../include/config.php");

$id = $_GET["id_barang"];

$hasil = mysqli_query($cn, "DELETE FROM tb_barang WHERE id_barang = $id");

header("Location: ../index.php");

?>