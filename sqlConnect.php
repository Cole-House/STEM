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
$sql = "SELECT name, age, gradeLevel FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row name,age,gradeLevel
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["name"]. " - Name: " . $row[age]. " " . $row[gradeLevel]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
?>
