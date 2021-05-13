<?php 
include 'database/database.php';
session_start();
if (isset($_POST["unitid"]))
{
	$unitid = $_POST["unitid"];
	if ($unitid) {
		$_SESSION['selectedunit'] = $unitid;
		$units = DB::run("SELECT * FROM units WHERE unitid=?", [$unitid])->fetchAll(PDO::FETCH_ASSOC);
        $unitsname = DB::run("SELECT unitname FROM units WHERE unitid=?", [$unitid])->fetchAll(PDO::FETCH_ASSOC);
        $questions = DB::run("SELECT quiz FROM units WHERE unitid=?", [$unitid])->fetchAll(PDO::FETCH_ASSOC);
	}
}
else if (isset($_SESSION['selectedunit'])) {
	$unitid = $_SESSION['selectedunit'];
	$units = DB::run("SELECT * FROM units WHERE unitid=?", [$unitid])->fetchAll(PDO::FETCH_ASSOC);
}
else {
	header('Location: forbidden.php');
	die();
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
			<h2><?php echo ''.$unitsname[0]['unitname'].' Quiz';?></h2>
			<hr>
            <form action="#" method="post" onsubmit="return checkAnswers()">
            
            <ol>
            <?php 
            $content = $questions[0]['quiz'];
            $pattern = '/{question}([\s\S.]*?){\/question}/';
            $answerarray = array();
            $count = 0;
                    preg_match_all($pattern, $content, $matches);
                    foreach( $matches[1] as $data){
                        
                        $ask_pattern = '/{ask}([\s\S.]*?){\/ask}/';
                        preg_match_all($ask_pattern, $data, $ask);
                        echo '<div class="card border-light mb-3" ><div class="card-header"><li>' .$ask[1][0]. '</li></div><div class="card-body">'; 
                        echo '<ul>';
                            $choiceA_pattern = '/{choiceA}([\s\S.]*?){\/choiceA}/';
                            preg_match_all($choiceA_pattern, $data, $choiceA);
                            echo '<li><label><input type="radio" value="A" name="'.$count.'"required>'.$choiceA[1][0].'</label></li>';
                            $choiceB_pattern = '/{choiceB}([\s\S.]*?){\/choiceB}/';
                            preg_match_all($choiceB_pattern, $data, $choiceB);
                             echo '<li><label><input type="radio" value="B" name="'.$count.'"required>'.$choiceB[1][0].'</label></li>';
                           $choiceC_pattern = '/{choiceC}([\s\S.]*?){\/choiceC}/';
                            preg_match_all($choiceC_pattern, $data, $choiceC);
                            echo '<li><label><input type="radio" value="C" name="'.$count.'"required>'.$choiceC[1][0].'</label></li>';
                           $answer_pattern = '/{answer}([\s\S.]*?){\/answer}/';
                            preg_match_all($answer_pattern, $data, $answer);
                            array_push($answerarray, $answer[1][0]);
                                            
                        echo '</div></ul>';
                        $count++;
                        
                    }
                $append['answers'] = $answerarray;  
            ?>
            </ol>
            <?php echo '<input type="hidden" name="unitid" value="' . $unitid . '"></input>' ?>
            <button class="btn btn-primary" type ="submit" >Submit</button>
            
            </form>
            
			<div id="quiz" class="row">
				<form id="quizform">
				</form>
			</div>
			<div id="results" class="row"></div>
			<input id="hiddenid" type="hidden" value="<?php echo $unitid; ?>">
		</div>
	</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/quiz.js"></script>
    <script>
        function checkAnswers(){
            var passedArray = <?php echo '["' . implode('", "', $answerarray) . '"]' ?>;
            var pArray = Array.from(passedArray);
            var score = 0;
            var total = pArray.length;
            pArray.forEach(function (value, i) {
                  var check = document.getElementsByName(i.toString());
                  if (check[0].checked) {
                        var choosen = check[0].value;
                  }else if(check[1].checked){
                        var choosen = check[1].value; 
                  }else if(check[2].checked){
                        var choosen = check[2].value;
                  }  
                if(choosen === pArray[i]){
                    score ++;   
                   }
            });  
            var grade = (score /total) * 100  
            
             alert('You scored '+ grade +'%');
       }
        
    </script>

</body>
</html>
