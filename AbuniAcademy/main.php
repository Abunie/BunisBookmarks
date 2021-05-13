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
			<h4>My Courses</h4>
			<hr>
			<ul class="collapsible">
				<?php
				include 'database/database.php';
				$id = $_SESSION['loggeduser'];
				if ($id) {
                    $username = DB::run('SELECT username from users where userid = ?;', [$id]) ->fetchAll(PDO::FETCH_ASSOC);
					$mycourses = DB::run('SELECT * from courses where courseid in (select courses_courseid from users_has_courses where users_userid=?);', [$id]);
					$rows = $mycourses->fetchAll(PDO::FETCH_ASSOC);
					if($rows) {  
						foreach ($rows as $row)
						{
							echo '<div class="card text-white bg-primary mb-3">';
							echo '<div class="card-header">' . $row['coursename'] . '</div> <ul class="list-group list-group-flush">';
							$units = DB::run('SELECT * from units where courses_courseid=?', [$row['courseid']]);
							while ($unit = $units->fetch(PDO::FETCH_LAZY))
							{
								echo '
									<li class="list-group-item"><a onclick="submitForm(this)" href="#" id=' . $unit['unitid'] . '>' . $unit['unitname'] . '</a></li>
									';
							}
							echo '</ul></div>';
						}
					}
					else { 
                        echo'
                            <div class="jumbotron" style="background-color:#ECECF0; padding:50px; margin:20px;">
                              <h4 class="display-4">Hello,'.$username[0]['username'].'</h4>
                              <p class="lead">You are not registered for any courses. To Register for courses please click on the button below.</p>
                              <p class="lead">
                                <a class="btn btn-primary btn-lg" href="courses.php" role="button">Register</a>
                              </p>
                            </div>';	
					}
				}
				else {
					header('Location: server/notlogged.php');
				}
				?>
			</ul>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/init.js"></script>
</body>

</html>
