<?php
include("../../include/config.php");


$id = $_GET["id_kategori"];
$hasil = mysqli_query($cn, "DELETE FROM tb_kategori WHERE id_kategori = $id");

header("Location: ../../category/index.php");