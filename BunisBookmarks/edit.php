<?php 
if (empty($_POST))
{
	include 'error.php';
	die();
}
else {
	include 'database/database.php';
	session_start();

	$new_url = $_POST["new_url"];

	$id = $_SESSION['loggeduser'];
	if (isset($_GET['bookmark_id'])) {
        $bookmark_id = $_GET['bookmark_id'];
		$row = DB::run("UPDATE bookmarks SET Url=? WHERE BookmarkID=?", [$new_url, $bookmark_id]);
		header('Location: home.php');
	}
	else {
		header('Location: error.php');
	}
}
?>