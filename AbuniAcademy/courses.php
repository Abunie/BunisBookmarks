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
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='server/logout.php'"><b> Logout </b></button> 
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='main.php'"><b> My Courses</b></button>
          <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='courses.php'"><b> Register </b></button>
      </div>  
    </header>
    
	<div class="container">
		<div class="card-panel">
			<h4>Available Courses</h4>
			<ul class="collapsible">
				<?php
				include 'database/database.php';
				$id = $_SESSION['loggeduser'];
				if ($id) {
					$courses = DB::run('SELECT * from courses where courseid not in (select courses_courseid from users_has_courses where users_userid=?);', [$id]);
					$rows = $courses->fetchAll(PDO::FETCH_ASSOC);
					if($rows) {
						foreach ($rows as $row)
						{
                            echo '<div class="card border-primary mb-3" >
                                      <div class="card-header">'. $row['coursename'] . '</div>
                                      <div class="card-body text-primary">
                                        <form action="server/registerclass.php" method="post"><p>' . $row['description'] . '</p> 
                                        <input type="hidden" name="courseid" value="'. $row['courseid'] . '">
                                        <button type="submit" class="btn btn-primary"> Register</button>  </form> 
                                      </div>
                                 </div>';
						}
					}
					else {
						echo '<b>There are no available courses that you have not registered for at the moment.</b>';
					}
				}
				else {
					header('Location: server/notlogged.php');
				}
				?>
			</ul>
		</div>
	</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/init.js"></script>
</html>
