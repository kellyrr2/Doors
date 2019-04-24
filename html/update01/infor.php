<?php
 $mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}
if(isset($_GET['id'])) {
    $id = ($_GET['id']);
        $company = ($_GET['company']);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>infor</title>
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
    </style>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Doors</a>
    </li>
  </ul>
</nav>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-2">
        <nav class="nav flex-column">
        <img src="https://lh3.googleusercontent.com/VSwHQjcAttxsLE47RuS4PqpC4LT7lCoSjE7Hx5AW_yCxtDvcnsHHvm5CTuL5BPN-uRTP=s180-rw" alt="Minecraft"style="width:150px;height:150px; ">
        </nav>
        </div>
         

        <div class="col-10">
        <?php echo "<h2>$id</h2>"?>
                       <?php echo "<a>$company</a>"?>
                      </div>
             </div>
</div>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-2">
        <nav class="nav flex-column">
        
        </nav>
        </div>
         

        <div class="col-10">
        <h4>Comments:</h4>
             <textarea name="comment" rows="5" cols="40"></textarea>
                      </div>
             </div>
</div>






</body>
</html>
