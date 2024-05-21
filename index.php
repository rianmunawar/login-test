<?php 
include 'koneksi.php';
session_start();

// Jika ada session user langsung redirect ke halaman setelah login
if(isset($_SESSION["username"])){
  header("Location: berhasilLogin.php");
  exit();
}

// ambil data dari form
if(isset($_POST["submit"])){
  // Ambil data post
  $username = $_POST["username"];
  $password = $_POST["password"];

  // ambil data user berdasar username dan password
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);

  if($result->num_rows>0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION["username"]=$row["username"];
    
    if($row["peran"]==="admin"){
      $_SESSION["peran"]=$row["peran"];
      header("Location: berhasilLogin.php");
    }else{
      $_SESSION["peran"]=$row["peran"];
      header("Location: dashboardPasien.php");
    }
    exit();
  }else{
    echo "<script>alert('Username atau password salah!')</script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>login</title>
  </head>
  <body>
    <div class="card">
      <h1>Login</h1>

      <form action="" method="POST" class="form-login">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="username" />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="password" />
        </div>

        <button type="submit" name="submit" class="submit">Login</button>
      </form>

      <p class="register">belum punya akun? <a href="">register</a></p>
    </div>
  </body>
</html>
