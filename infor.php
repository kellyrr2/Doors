<?php
// Initialize the session
session_start();

 $mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$id=$company=$icon=$describe1 = $link =$comment="";


     $id = (isset($_GET['id']) ? $_GET['id'] : '');
     $company = (isset($_GET['company']) ? $_GET['company'] : '');    
     $icon = (isset($_GET['icon']) ? $_GET['icon'] : '');
     $describe1 = (isset($_GET['describe1']) ? $_GET['describe1'] : '');
     $link = (isset($_GET['link']) ? $_GET['link'] : '');
if(isset($_SESSION["loggedin"])){
          $user =  htmlspecialchars($_SESSION['username']);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

                    
 $comment= trim($_POST["comment"]);
 $appname= trim($_POST["appname"]);
 $user= trim($_POST["user"]);


 $stmt2 = $mysqli->prepare("INSERT INTO appcomment (appname, comment, user) VALUES (?,?,?)");
            $stmt2->bind_param("sss", $param_appname, $param_comment, $param_user);
            
            // Set parameters
            $param_appname = $appname;
            $param_comment = $comment;
            $param_user = $user;
            // Attempt to execute the prepared statement
            if($stmt2->execute()){
                header("location: infor.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        
          // Close statement
        $stmt2->close();
                $mysqli->close();
}
?>
      



<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>infor</title>
                      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
    </style>
</head>
<body style="background-color: rgb(220, 220, 220)">


<nav class="navbar  navbar-inverse" >
         <div class="container-fluid">
           <ul class="nav navbar-nav">
              <li> <img src="door.png" style="width:50px;height:50px;"></li>
             <li class="active"><a href="index.php">Doors</a></li>
<?php
 if(isset($_SESSION["loggedin"])){
echo"<li><a href='submit.php'>Submit App</a></li>";
}
?>

           </ul>
           <ul class="nav navbar-nav navbar-right">
                   <?php  
                                     if(isset($_SESSION["loggedin"])){
                              echo "<li><a>";
                                                         echo htmlspecialchars($_SESSION['username']);
                                                         echo" </a></li>";
                            echo" <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                                      }else{
              echo" <li><a href='password.php'><span class='glyphicon glyphicon-user'></span>Sign Up</a></li>"; 
                                      echo" <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";}
           ?>
           </ul>
         </div>
       </nav>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-sm-2">
        <nav class="nav flex-column">
       <img src="<?php echo $icon; ?>"width:150px;height:150px; ">
        </nav>
        </div>
        <div class="col-sm-10"style="margin-top: -20px;">
        <?php echo "<h2>$id</h2>"?>
                      <?php echo "<a href='$link' style='margin-left: 10px;'>$company</a>"?>
                      </div>
        </div>
<div class="col-sm-2">
</div>
<div  class="col-sm-10" style="margin-top: -60px;">
       
        <h4>Description:</h4>
          <p><?php echo $describe1?></p>
        </nav>
     </div>
</div>

<hr>


<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-9">
        <h4>User Comments:</h4>
<?php 
$sd =  mysqli_query($mysqli, "SELECT user,reg_date,comment,id FROM appcomment WHERE appname = '$id'");
    while ($row = mysqli_fetch_assoc($sd)){

        echo  "<div class='media'>";
    echo "<div class='media-left'>";
    echo"<img src='http://wprdea.org/image/img_avatar.png' class='img-circle' style='width:60px;'>";
    echo"</div>";
         echo"<div class='media-body'>";
     echo"<h4>";
          echo $row['user'];
            echo"&nbsp;&nbsp;<small><i>";
             echo $row['reg_date']; 
            echo " </i></small></h4>";

     echo "<p>";
        echo $row['comment'];
          echo "</p>" ;  
if(isset($_SESSION["loggedin"])&&($_SESSION['username']=="123456"||$_SESSION['username'] == $row['user'])){
 echo "<button class='btn btn-danger'><a href='commentdelete.php?id=".$row['id']." 'style='color:white; text-decoration:none'>Delete</a></button>";
}
 
     echo "</div>";
    echo "</div>";
    echo "<hr>";

}
?>






<div id="hide" style ="display:none">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" target="nm_iframe">
            <div class="form-group">
                <label><h4>Your Comment</h4></label>
                                <input type="hidden" name="appname" class="form-control" value="<?php echo $id; ?>"readonly>
                                          <input type="hidden" name="user" class="form-control" value="<?php echo $user; ?>"readonly>
                <textarea  rows="5" cols="40" name="comment" class="form-control" value="<?php echo $comment; ?>"></textarea>
                <input type="submit" class="btn btn-primary" value="Submit" onclick='myFunction()'>
                <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
            </div>
</form>  
  <iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>  
</div>

         </div>

  </div>

<ul class="pagination justify-content-end">
<?php
if(isset($_SESSION["loggedin"])){
echo "<li class='page-item'><a class='page-link'  onclick='myFunction()'>Add your comment</a></li>";
}
?>
</ul>
       
   </div>
    </div>

</div>




</body>

<script>
function myFunction() {
  var x = document.getElementById("hide");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
</html>