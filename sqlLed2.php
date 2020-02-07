<?php
$servername = "localhost";
$username = "root";
$password = "posiulai123";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
#connect and check if connected to database and pi

echo '<a href = "ledChange0.php">" Turn Off "</a>';
#link to other php page to turn off light

$sql = "UPDATE Lights SET MyLight = 1";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo "Changed Successfully";
}else{
	echo " ERROR: " . $sql . "<br>" . $conn->error;
	
}
#Changes the sql database MyLight value to 1 in Lights table signifying On
echo "<br>";

print("LIGHT Off")
?> 
