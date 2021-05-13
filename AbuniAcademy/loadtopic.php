<?php 
include 'database/database.php';
session_start();
if (isset($_POST["unitid"]))
{
	$unitid = $_POST["unitid"];
	if ($unitid) {
		$_SESSION['selectedunit'] = $unitid;
	}
}
else if (isset($_SESSION['selectedunit'])) {
	$unitid = $_SESSION['selectedunit'];
}
else {
	header('Location: forbidden.php');
	die();
}
$units = DB::run("SELECT * FROM units WHERE unitid=?", [$unitid])->fetchAll(PDO::FETCH_ASSOC);
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
<body >
    <header>
      <div class="topnav">
          <img style="margin: 2px" alt="Logo" src="../shared/AbuniAcademy/logo.png" width="400" height="100" align="left"/>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='server/logout.php'"><b> Logout </b></button> 
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='main.php'"><b> My Courses</b></button>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='courses.php'"><b> Register </b></button>
      </div>  
    </header>
	<div class="container">
		<div class="card-panel">
			<?php 
			foreach ($units as $unit) {
                echo('<br></br>');
                echo '<h4>'.$unit['unitname'].'</h4>';
				echo('<hr></hr>');
                echo '<div class="card"> <ul class="list-group list-group-flush">';
                    $content = $unit['content'];
                    $pattern = '/{data}([\s\S.]*?){\/data}/';
                    preg_match_all($pattern, $content, $matches);
                    foreach( $matches[1] as $data){
                        echo '<li class="list-group-item">' .$data. '</li>'; 
                    }  
                echo '</ul></div>';
			}
			
           echo '<div style="padding:20px 0px;">
                    <form action="quiz.php" method="post" class="dropdown-form">
                        <input type="hidden" name="unitid" value="' . $unitid . '"></input>
                        <button class="btn btn-primary" type="submit">Take quiz</button>
                    </form>
               </div>'
			?>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/init.js"></script>
</body>

</html>
