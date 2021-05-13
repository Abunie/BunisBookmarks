<?php
include '../database/database.php';
session_start();
if (isset($_SESSION['loggeduser'])) {
	header('Location: home.php');
}
?>

<html>
<head>
	<title>Buni's Bookmarks</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="../../shared/style.css">
</head>
<body>
    <header>
      <div class="topnav">
          <img style="margin: 2px" alt="Logo" src="../../shared/BunisBookmarks/logo.png" width="452" height="74" align="left"/>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='sign_up_page.php'"><b> Sign Up</b></button>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='sign_in_page.php'"><b> Sign In </b></button> 
      </div>   
    </header>
   	<div >
        <h1> That user name has been taken. </h1>
        <button type="button"  style="float: right; margin:20px;" class="btn btn-success" onclick="window.location.href='sign_up_page.php'"><b> Try Signing Up Again</b></button>
    
        
		
		</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>