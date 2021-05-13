<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="../shared/style.css">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <header>
        <div class="topnav">
          <img style="margin: 2px" alt="Logo" src="../shared/BunisBookmarks/logo.png" width="452" height="74" align="left"/>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='sign_in_page.php'"><b> Sign In </b></button> 
       </div>   
    </header>

<form class="form-signin" method="post" action="sign_up.php">
  <h2 class="h3 mb-3 font-weight-normal">Sign Up</h2>
  <label for="inputUserName" class="sr-only">Username</label>
  <input type="text" name="inputUserName" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input  type="password" name="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
</form>
</body>
</html>
