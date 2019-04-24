<?php
session_start();
 $mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}
$appname = $company = $email= $link = $price = $version= $type ="  ";
if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
 $appname = trim($_POST["appname"]);
 $company = trim($_POST["company"]); 
  $email = trim($_POST["email"]); 
  $link = trim($_POST["link"]);
 $price = trim($_POST["price"]);
 $version = trim($_POST["version"]);
 $type = trim($_POST["type"]);
        // Prepare an insert statement
       
            $stmt2 = $mysqli->prepare("INSERT INTO app (appname, company, email, link, price, version, type) VALUES (?,?,?,?,?,?,?)");
            $stmt2->bind_param("sssssss", $param_appname, $param_company, $param_email, $param_link, $param_price, $param_version, $param_type);
            
            // Set parameters
            $param_appname = $appname;
            $param_company = $company;
            $param_email = $email;
            $param_link = $link;
            $param_price = $price;
            $param_version = $version;
            $param_type = $type;
            
            // Attempt to execute the prepared statement
            if($stmt2->execute()){
                header("location: index.php");
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
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>

<body>

<nav class="navbar  navbar-inverse" >
         <div class="container-fluid">
                   <ul class="nav navbar-nav">
                   <li ><a>Doors</a></li>
                    </ul>
                    </div>
          </nav>




    <div class="wrapper">
        <h3>Submit System</h3><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>appname</label>
                <input type="text" name="appname" class="form-control" value="<?php echo $appname; ?>">
            </div>    
            <div class="form-group">
                <label>company</label>
                <input type="text" name="company" class="form-control" value="<?php echo $company; ?>">
            </div>    
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>    
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="<?php echo $link; ?>">
            </div>    
            <div class="form-group">
                <label>price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
            </div>    
            <div class="form-group">
                <label>version</label>
                <input type="text" name="version" class="form-control" value="<?php echo $version; ?>">
            </div>    
            <div class="form-group">
                <label>type</label>
                <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
            </div>    

          
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                                  <button type="reset"class="btn btn-primary" value="Reset">Reset</button>
            </div>
        </form>
<?php
if($_SESSION['username']=="123456"){
echo "Sumbit to the Database";
}
else{
echo "Sumbit to the Admin";
}
?>

          <ul class="pager">
  <li class="previous"><a href="index.php">Back to home</a></li>
  </ul>

    </div>    
</body>
</html>
