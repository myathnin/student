
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <a href="create.php">Create Book</a>
</body>
</html>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1:3307", "root", "", "hninnwe");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM books";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>No</th>";
                echo "<th>Name</th>";
                echo "<th>Category</th>";
                echo "<th>Prize</th>";
                echo "<th>Author</th>";
                echo "<th>Date</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['prize'] . "</td>";
                echo "<td>" . $row['auther'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . "<a href='edit.php?id=$row[id]'>Edit</a> <a href='delete.php?id=$row[id]'>Delete</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>