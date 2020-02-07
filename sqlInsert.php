 <?php
$servername = "localhost";
$username = "User";
$password = "password";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//creating connection and putting in login credentials
// Check connection
$fname = 'Bertrum';
$age = 24;
$gradeLevel = 12;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO students (name,age,gradeLevel)
VALUES ('$fname', '$age' , '$gradeLevel')";
//creating a sql variable with the string we inputted and the corresponding values
// InSERT InTO the tableName you made(column1, column2, column3 ) VALUES (value1, value2,value3)
if ($conn->query($sql) === TRUE) {
    // putting the query of sql w/info into $conn as a query file
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
