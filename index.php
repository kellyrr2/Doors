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
    <body background="back3.jpg">
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
     
  <div class="container">
     
   <h2>Doors<img src="door.png" style="width:50px;height:50px;">Table</h2>
   <p>Type something in the input field to search the table for app's name, company name, current version or email:</p>  
    <div class="col-sm-6">
      <input  class="form-control" id="myInput" type="text" placeholder="Search..">
   </div>
      <br>      
   <table class="table table-bordered table-striped table-hover">
     <thead>
       <tr>
                <th></th>
               <th class = "dropdown"><a class="dropdown-toggle" data-toggle="dropdown"> APP's Name<span class="caret"></span></a>
     <ul class="dropdown-menu">
      <li onclick="sortTable(1)"><a>Sort by name</a></li>
    </ul>
</th>
         <th class = "dropdown"><a class="dropdown-toggle" data-toggle="dropdown"> Company Name<span class="caret"></span></a>
           <ul class="dropdown-menu">
 <li onclick="sortTable(2)"><a>Sort by company name</a></li>            
</ul>
 </th>
                   <th class = "dropdown"><a class="dropdown-toggle" data-toggle="dropdown"> Type<span class="caret"></span></a>
     <ul class="dropdown-menu">

      <li onclick="sortTable(3)"><a>Sort by type</a></li>
    </ul>
</th>

         <th>Current Version</th>
                  <th>Price</th>
         <th>Email</th>
       </tr>
     </thead>
     <tbody id="myTable">
       <?php
    $sd =  mysqli_query($mysqli, "SELECT appname, company,email, link, price,version,type,icon,describe1 FROM app");
    while ($row = mysqli_fetch_assoc($sd)) {

        echo '<tr><td>'; ?>
                 <img src='<?php echo  $row['icon']; ?>' style="width:30px;height:30px;">
                </td><td>
        <?php 
        echo $row['appname']; 
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
        echo "<td><button><a href='infor.php?id=".$row['appname']."&company=".$row['company']." &icon=".$row['icon']." &describe1=".$row['describe1']." &link=".$row['link']."'>Detail</a></button></td>";

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


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 0; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
 </script>
  </body>
</html>