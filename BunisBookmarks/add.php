<?php 
if (empty($_POST))
{
	include 'error.php';
	die();
}
else {
	include 'database/database.php';
	session_start();

	$url = $_POST["url"];

	$id = $_SESSION['loggeduser'];
	if ($id) {
		$duplicate = DB::run("SELECT BookmarkID FROM bookmarks WHERE `Url`=? AND `UserID`=?", [$url, $id])->fetch();
		if($duplicate) {
			header('Location: home.php?duplicate=true');
			die();
		}
		$row = DB::run("INSERT INTO bookmarks (`Url`, `UserID`) VALUES (?, ?)"
			, [$url, $id]);
		header('Location: home.php');
	}
	else {
		header('Location: error.php');
	}
}
?>