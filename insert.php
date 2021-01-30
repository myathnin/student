



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1:3307", "root", "", "hninnwe");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 $name=  mysqli_real_escape_string($link, $_REQUEST['name']);
 $category=  mysqli_real_escape_string($link, $_REQUEST['category']);
 $prize=  mysqli_real_escape_string($link, $_REQUEST['prize']);
 $auther=  mysqli_real_escape_string($link, $_REQUEST['auther']);
 $date=  mysqli_real_escape_string($link, $_REQUEST['date']);
// Attempt insert query execution
$sql = "INSERT INTO books (name, category, prize,auther,date) VALUES ('$name', '$category', '$prize','$auther','$date')";
if(mysqli_query($link, $sql)){
    header("location:index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>