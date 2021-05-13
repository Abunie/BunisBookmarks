<?php
include 'database/database.php';
session_start();
if (isset($_SESSION['loggeduser'])) {
	header('Location: main.php');
}
?>

<html>
<head>
	<title>Abuni's Academy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="../shared/style.css">
</head>
<body>
<header>
      <div class="topnav">
          <img style="margin: 2px" alt="Logo" src="../shared/AbuniAcademy/logo.png" width="400" height="100" align="left"/>
      </div>   
</header>
<div>  
    <h1 style="text-align:center; padding:20px;">Welcome to Abuni Academy! To register or view courses, please sign up or sign in.</h1>
    <div class="card" style="margin: 0 auto;float: none; margin-bottom: 10px;" >
      <div class="card-body">
          <form class="form-signin" method="post" action="server/login.php">
          <h2 class="h3 mb-3 font-weight-normal">Sign In</h2>
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="row">
                        <p class="red-text center">
                        <?php
                            if(isset($_GET['failed']) && $_GET['failed']) {
                                echo 'Username or password is wrong';
                            };
                        ?>
                        </p>
         </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <h6>Don't have an account ?  <a style="color:blue;" href="registerpage.php"> Sign Up !</a></h6>	
        </form>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
