<?php 
if (empty($_POST))
{
	include 'error.php';
	die();
}
else {
	include 'database/database.php';

	$username = $_POST["inputUserName"];
	$password = md5($_POST["inputPassword"]);

	$row = DB::run("SELECT * FROM Users WHERE Username=? AND Password=?", [$username, $password])->fetch();

	if(!$row) {
		header('Location: sign_in_page.php?failed=true');
	}
	else {
		session_start();
		$_SESSION['loggeduser'] = $row['UserID'];
        $_SESSION['loggedname'] = $row['Username'];
		header('Location: home.php');
	}
}
?>