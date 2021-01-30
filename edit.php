<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1:3307", "root", "", "hninnwe");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $id= $_REQUEST['id'];
// Attempt select query execution
$sql = "SELECT * FROM books WHERE id='$id'";
if($result = mysqli_query($link, $sql)){
      
       $row = mysqli_fetch_array($result);
        // Free result set
        mysqli_free_result($result);
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>



	<div>
		<form action="update.php" method="post" >
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<p>
				<label>Name :</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>">
			</p>

			<p>
				<label>Category :</label>
				<input type="text" name="category"  value="<?php echo $row['category']; ?>">
			</p>
			<p>
				<label>Prize :</label>
				<input type="text" name="prize" value="<?php echo $row['prize']; ?>">
			</p>
			<p>
				<label>Auther :</label>
				<input type="text" name="auther" value="<?php echo $row['auther']; ?>">
			</p>
			<p>
				<label>Date :</label>
				<input type="date" name="date" value="<?php echo $row['date']; ?>">
			</p>
			<p>
				<input type="submit" name="submit" value="Update">
			</p>
		</form>
	</div>




	
</body>
</html>