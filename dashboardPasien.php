<?php 
session_start();

if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard Pasien</title>
</head>
<body>
    <h1>Hallo, Selamat datang kembali <?php echo $_SESSION["username"] ?>!</h1>
    <h4>Kamu seorang <?php echo $_SESSION["peran"] ?>!</h4>

    <a href="logout.php">Logout</a>
</body>
</html>