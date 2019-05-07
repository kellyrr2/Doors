<?php
// Initialize the session
session_start();

 $mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$id=$company=$icon=$describe1 = $link ="";


     $id = (isset($_GET['id']) ? $_GET['id'] : '');
     $company = (isset($_GET['company']) ? $_GET['company'] : '');    
          $icon = (isset($_GET['icon']) ? $_GET['icon'] : '');
     $describe1 = (isset($_GET['describe1']) ? $_GET['describe1'] : '');
     $link = (isset($_GET['link']) ? $_GET['link'] : '');

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
       
        <h4>Describe:</h4>
          <p><?php echo $describe1?></p>
        </nav>
     </div>
</div>

<hr>


<div class="container" style="margin-top: 40px;">
    <div class="row">
        
         

        <div class="col-9">
        <h4>User Comments:</h4>
    <div class="media">
    <div class="media-left">
    <img src="women.jpg" class="img-circle" style="width:60px;">
         </div>
    <div class="media-body">
      <h5>Mary Moe <small><i>05/01/2019</i></small></h5>
      <p>Great!This is the best game I've ever played!This game brings me a lot of fun!</p>      
    </div>
    </div>
          <hr>
      <div class="media">
     <div class="media-left">
       <img src="http://wprdea.org/image/img_avatar.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
               </div>
       <div class="media-body">
      <h5>John Doe <small><i>05/01/2019</i></small></h5>
      <p>Allow child account to be able to multiplayer without the permisson. if i need permission to even play with my friends then what for i add my friends in xbox</p>      
    </div>
</div>
<hr>
      <div class="media">
     <div class="media-left">
    <img src="http://wprdea.org/image/img_avatar.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
         </div>
    <div class="media-body">
      <h5>Noverber Rain<small><i>05/01/2019</i></small></h5>
      <p>This new update is great! I would like to mention that in the new villages i dont seem to be able to find any loot in the chests... other than that i think this game is very succesfull and is widely reccommendable! It has grown so quickly and has lots of different features that are really fun and it...</p>      
    </div>
     </div>

<div id="hide" style ="display:none">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  target="nm_iframe">
            <div class="form-group">
                <label><h4>Your Comment</h4></label>
                <textarea  rows="5" cols="40" name="describe1" class="form-control" value="<?php echo $describe1; ?>"></textarea>
                   <input type="submit" class="btn btn-primary" value="Submit">
                <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
            </div>
</form>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>    

</div>

         </div>

  </div>

<ul class="pagination justify-content-end">

 <li class="page-item"><a class="page-link"  onclick="myFunction()">Add your comment</a></li>

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