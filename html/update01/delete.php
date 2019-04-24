<?php
 $mysqli = mysqli_connect("localhost", "cse383", "HoABBHrBfXgVwMSz", "cse383");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}
if(isset($_GET['id'])) {
    $delete_id = ($_GET['id']);
    $sql ="DELETE FROM app WHERE appname = '".$delete_id."'";
    if($mysqli->query($sql) === TRUE) {
        echo "<br/><br/><span>deleted successfully...!!</span>";
                header("location: index.php");
    } else {
        echo "ERROR";
    }
}
mysqli_close($mysqli);
?>
