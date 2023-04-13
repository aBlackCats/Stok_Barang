<!-- Menghubungkan ke Database db_barang -->

<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "db_barang";

$cn = mysqli_connect($server, $user, $pass, $db);

if (!$cn) {
    die("<script>alert('Connection Failed')</script>");
}else

?>