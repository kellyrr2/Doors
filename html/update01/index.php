<?php
// Initialize the session
session_start();
$mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}
?>


<!DOCTYPE html>
<html>
       <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
      <nav class="navbar  navbar-inverse" >
         <div class="container-fluid">
           <ul class="nav navbar-nav">
             <li class="active"><a href="index.php">Doors</a></li>
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
               <ul class="dropdown-menu">
<?php
 if(isset($_SESSION["loggedin"])){
echo"<li><a href='submit.php'>Submit App</a></li>";
}
?>
                 
                 <li><a href="#">Page 1-2</a></li>
                 <li><a href="#">Page 1-3</a></li>
               </ul>
             </li>
             <li><a href="#">Page 2</a></li>
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
     
  <div class="container">
   <h2>Filterable Table</h2>
   <p>Type something in the input field to search the table for app's name, company name, current version or email:</p>  
   <input class="form-control" id="myInput" type="text" placeholder="Search..">
   <br>
   <table class="table table-bordered table-striped">
     <thead>
       <tr>
         <th>APP's Name</th>
         <th>Company Name</th>
                   <th>Type</th>
         <th>Current Version</th>
                  <th>Price</th>
         <th>Email</th>
       </tr>
     </thead>
     <tbody id="myTable">
       <?php
    $sd =  mysqli_query($mysqli, "SELECT appname, company,email, link, price,version,type FROM app");
    while ($row = mysqli_fetch_assoc($sd)) {
        echo '<tr><td>';     
        ?>
        <a href="<?php echo $row['link'] ?>"> <?php echo $row['appname'] ?></a>
        <?php
        echo '</td><td>';
        echo $row['company'];
        echo '</td><td>';
        echo $row['type'];
        echo '</td><td>';
        echo $row['version'];
        echo '</td><td>';
        echo $row['price'];
        echo '</td><td>';
        echo $row['email'];
       echo "<td><button ><a href='infor.php?id=".$row['appname']."&company=".$row['company']."'>More</a></button></td>";
 if(isset($_SESSION["loggedin"])&&$_SESSION['username']=="123456"){
 echo "<td><button ><a href='delete.php?id=".$row['appname']." '>Delete</a></button></td>";
}
        echo '</td></tr>';
                   
    }
 ?>


     </tbody>
   </table>
   
 </div>


<footer class="navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <span>Winning!</span>
  </div>
</footer>
 
 <script>
 $(document).ready(function(){
   $("#myInput").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
 });
 </script>
  </body>
</html>
