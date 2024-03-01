<?php
include "koneksi.php";

if (isset($_POST['register'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql=mysqli_query($conn,"insert into user values('','$username','$password','$email','$namalengkap','$alamat')");

header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> azizah Gallery </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
    include "layout/header.html";
    ?>

<main class="container">
   <div class="row justify-content-center">
   <div class="col-sm-4 mt-4">
    <div class="text-center">
    <h1> REGISTER </h1>
    </div>
 
  <form action="register.php" method="POST">
    <div class="mb-3 mt-4">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Masukan username" name="username">
    </div>
    <div class="mb-3 mt-4">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password">
    </div>
    <div class="mb-3 mt-4">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email">
    </div>
    <div class="mb-3 mt-4">
      <label for="namalengkap">Nama Lengkap:</label>
      <input type="text" class="form-control" id="namalengkap" placeholder="Masukan nama lengkap" name="namalengkap">
    </div>
    <div class="mb-3 mt-4">
      <label for="alamat">Alamat:</label>
      <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" name="alamat">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <div class="d-grid gap-2" class="text-center">
    <button type="submit" class=" btn btn-info" name="register">Sign Up</button>
    </div>

    <div class="text-center">
    Already have an account? Go <a href="login.php">Sign in</a>
    </div>
    
  </form>
</div>
</div>
</main>

    <?php 
    include "layout/footer.html";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>