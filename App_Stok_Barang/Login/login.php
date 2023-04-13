<?php

include '../include/config.php';

error_reporting(0);

session_start();

if(isset($_SESSION['username'])) {
    header("Location: login_berhasil_admin.php");
}

// Validasi Data user
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['pass']);

    $sql = "SELECT * FROM tb_user WHERE username = '$username' AND pass = '$password'";
    $hasil = mysqli_query($cn, $sql);
    if($hasil->num_rows > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION['username'] = $row['username'];
        header("Location: login_berhasil_admin.php");
    }else {
        echo "<script>alert('Username or Password Error. Please try again!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Login</title>
</head>
<body>
    <div class="alert" role="alert">
        <?php echo $_SESSION["error"] ?>
    </div>

    <div class="container">
        <form action="" method="post" class="login-username">
            <input type="text" placeholder="Username" name="username" id="username" value="<?php echo $username; ?>" required>
            <br>
            <input type="password" name="pass" id="password" placeholder="Password" value="<?php echo $_POST['pass']; ?>" required>
            <br>
            <button class="btn" name="submit">Login</button>
        </form>
    </div>
</body>
</html>