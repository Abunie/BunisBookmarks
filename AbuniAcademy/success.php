<?php
session_start();
if (!isset($_SESSION['loggeduser'])) {
	header('Location: server/notlogged.php');
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
	<div class="container">
        
		<div class="card-panel">
            <div class="alert alert-success" style="margin: 50px;">
                <h4>Success!</h4>
			    <b>You are being redirected back to the main page in 3 seconds. To redirect now, click <a href="main.php">here.</a></b>
            </div>
			<?php
			header( "refresh:5;url=main.php" );
			?>
		</div>
	</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/init.js"></script>
</html>
