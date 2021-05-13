<?php
session_start();
if (!isset($_SESSION['loggeduser'])) {
	header('Location: error.php');
}
if (!isset($_SESSION['loggedname'])) {
	header('Location: error.php');
}
?>
<html>
<head>
	<title>Buni's Bookmarks</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="../shared/style.css">
</head>
<body>
    <header>
        <div class="topnav">
  
           <img style="margin: 2px" alt="Logo" src="../shared/BunisBookmarks/logo.png" width="452" height="74" align="left"/>
           <button type="button"  style="float: right; margin:20px;" class="btn btn-light" onclick="window.location.href='sign_out.php'"><b> Sign Out</b></button>
       </div>   
    </header>
    <h1> <?php
			include 'database/database.php';
			$name = $_SESSION['loggedname'];
            echo "Hello, " .$name. " !" ;

			?>
    </h1>
    <div class ="card">
        
       
        <button type="button" style="align-self:center; margin:20px;" data-toggle="modal" data-target="#addModal"  class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
</svg><b> Add Bookmark</b></button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form name="addform" class="card" action="add.php" onsubmit="return validateAdd()" method="post" required>
                   <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Please enter the URL.</h5>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="input-group mb-3">
                      <input type="url" name="url" class="form-control" placeholder="Enter Your Url" aria-label="Url" aria-describedby="basic-addon1">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
          </div>
        </div>
    <div class="card" style="margin:20px;">
      <div class="card-header">
        <b> Your Bookmarks</b>
      </div>
      <ul class="list-group list-group-flush">
        <?php
			$id = $_SESSION['loggeduser'];
			$query = DB::run("SELECT * FROM bookmarks WHERE UserID=?", [$id]);
			while ($row = $query->fetch(PDO::FETCH_LAZY))
			{
				$url = $row['Url'];
                $user_id = $row['UserID'];
                $bookmark_id = $row['BookmarkID'];
				echo "<li class=\"list-group-item\">  <a href=\"" . $url . "\">" . $url . "</a>
        
                 <button type=\"button\" style=\"float:right; align-self:center;margin:2px; \" data-toggle=\"modal\" data-target=\"#deleteModal" .$bookmark_id. "\"  class=\"btn btn-secondary\">Delete</button>  
                 <button type=\"button\" style=\"float:right; align-self:center; margin:2px; \" data-toggle=\"modal\" data-target=\"#editModal" .$bookmark_id. "\"  class=\"btn btn-secondary\">Edit</button>
                
                  <div class=\"modal fade\" id=\"deleteModal".$bookmark_id. "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
                  <div class=\"modal-dialog\" role=\"document\">
                    <div class=\"modal-content\">
                      <form name=\"deleteform\" class=\"card\" action=\"delete.php?bookmark_id=" .$bookmark_id. "\" method=\"post\" >
                           <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"deleteModalLabel\">Are you sure you want to delete this?</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>
                          <div class=\"input-group mb-3\" style =\"display:none\">
                              <input name=\"url\" value=\" ".$url. " \" class=\"form-control\" placeholder=\"Enter Your Url\" aria-label=\"Url\" aria-describedby=\"basic-addon1\">
                          </div>
                          <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">No</button>
                            <button type=\"submit\" class=\"btn btn-primary\">Yes</button>
                          </div>
                       </form>
                    </div>
                  </div>
                </div>
                <div class=\"modal fade\" id=\"editModal".$bookmark_id. "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">
                  <div class=\"modal-dialog\" role=\"document\">
                    <div class=\"modal-content\">
                      <form name=\"editform\" class=\"card\" action=\"edit.php?bookmark_id=" .$bookmark_id. "\" method=\"post\" onsubmit=\"return validateEdit()\">
                           <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"editModalLabel\">Edit your URL.</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                              <span aria-hidden=\"true\">&times;</span>
                            </button>
                          </div>
                          <div class=\"input-group mb-3\">
                              <input type=\"url\" name=\"new_url\" value=\"".$url. "\" class=\"form-control\" placeholder=\"Enter Your Url\" aria-label=\"NewUrl\" aria-describedby=\"basic-addon1\">
                          </div>
                          <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            <button type=\"submit\" class=\"btn btn-primary\">Save changes</button>
                          </div>
                       </form>
                    </div>
                  </div>
                </div>
              </li>  
              ";
			}
			?>
      </ul>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        
        function validateAdd() {
          var x = document.forms['addform']["url"].value;
          if (x == "" || x == null) {
            alert("Url cannot be empty");
            return false;
          }
        }
        
         function validateEdit() {
          var x = document.forms['editform']["new_url"].value;
          if (x == "" || x == null) {
            alert("Url cannot be empty");
            return false;
          }
        }
    </script>
  

</body>

</html>