<?php
$servername = "localhost";
$username = "root";
$password = "posiulai123";
$dbname = "database";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); }
echo "Connected successfully";
#connecgt to pi and database

echo '<a href = "ledChange1.php">" Turn On "</a>';
#link to the other php page to turn on the light

$sql = "UPDATE Lights SET MyLight = 0  ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo "Changed Successfully";
}else{
	echo " ERROR: " . $sql . "<br>" . $conn->error;
}
echo"<br>";
#changes the value of MyLight on Lights table to 0 representing the LED off

$pinStatus = shell_exec("gpio -g read 26");
//returns 0 = low; 1 = high
if ($pinStatus = "1") {
    echo "LED On.";
} else {
    echo "LED Off";
}
#executes a pin status check to see if LED is on through GPIO

?> 
