<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//creating connection and putting in login credentials
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE students SET age=18 WHERE name='Bertrum'";
// Updating the age of Bertrum in the students table with UPDATE and WHERE commands
if ($conn->query($sql) === TRUE) {
    // putting the query of sql w/info into $conn as a query file
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
#connection close
?> 
