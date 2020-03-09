<?php
$servername = "192.168.0.214";
$username = "humid";
$password = "password";
$dbname = "humidity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//creating connection and putting in login credentials
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

$sql = "SELECT dateTime FROM temperatureData";
$result = mysqli_query($conn, $sql);
$sql2 = "SELECT temperature FROM temperatureData";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT humidity FROM temperatureData";
$result3 = mysqli_query($conn, $sql3);
#php Select queries for selecting all the rows from temperatureData table

$sql4 = "SELECT * FROM temperatureData ORDER BY temperature DESC LIMIT 1";
$result4 = mysqli_query($conn, $sql4);
$sql5 = "SELECT * FROM temperatureData ORDER BY temperature ASC LIMIT 1";
$result5 = mysqli_query($conn, $sql5);
#Selecting the highest and lowest temperature and corresponding dateTime with DESC and ASC LIMIT

$sql6 = "SELECT * FROM temperatureData ORDER BY humidity DESC LIMIT 1";
$result6 = mysqli_query($conn, $sql6);
$sql7 = "SELECT * FROM temperatureData ORDER BY humidity ASC LIMIT 1";
$result7 = mysqli_query($conn, $sql7);
#Selecting the highest and lowest humidity reading

$strDate= "";
$strTemp= "";
$strHum= "";
#creating empty strings for all the data we are going to pull from each row

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         $strDate=$strDate. "," . $row["dateTime"];
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
         $strTemp=$strTemp. "," . $row2["temperature"];
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {
         $strHum=$strHum.",".$row3["humidity"];
    }
} else {
    echo "0 results";
}
#these three if statements help fetch and appending all the data from each row to its corresponding empty string with "," in between each input

if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {
         echo "Highest Temperature: ". $row4["temperature"]."C ". $row4["dateTime"]."<br></br>";
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)) {
         echo "Lowest Temperature: ". $row5["temperature"]."C ". $row5["dateTime"]."<br></br>";
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result6) > 0) {
    // output data of each row
    while($row6 = mysqli_fetch_assoc($result6)) {
         echo "Highest Humidity: ". $row6["humidity"]."% ". $row6["dateTime"]."<br></br>";
    }
} else {
    echo "0 results";
}
if (mysqli_num_rows($result7) > 0) {
    // output data of each row
    while($row7 = mysqli_fetch_assoc($result7)) {
         echo "Lowest Humidity: ". $row7["humidity"]."% ". $row7["dateTime"]."<br></br>";
    }
} else {
    echo "0 results";
}
# extracting the select query result from each query and pulling the data and neatly placing it within its corresponding sentence

echo "Note*: You may refer to our phpmyadmin page for x-axis values and the database has not had any new inputs since 03/04/20;
#This line is made as an alert to say we haven't updated the database; and that we were not able to get the dateTime x-axis working

$myStrDate= substr($strDate,1);
$strTemperature = substr($strTemp,1);
$strHumid = substr($strHum,1);

# These lines take the first character in the beginning of each large string and removes it

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"> </script>

<meta charset="utf-8">
<title> </title>
</head>
<body>

<div id="chart">
</div>
<script>
var options = {
series: [
{
name: "Temperature (C)",
data: [<?php echo $strTemperature; ?>]
//inputting the temperature string into one line data
},
{
name: "Humidity (%)",
data: [<?php echo $strHumid; ?>]
//inputting the humidity string into the other line
}
],
chart: {
height: 350,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#77B6EA', '#545454'],
dataLabels: {
enabled: true,
},
stroke: {
curve: 'smooth'
},
title: {
text: 'Temperature And Humidity Graph',
align: 'center'
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
categories:[],
//We left the catergories array empty because the graph wouldn't work if we tried inputting the dateTime string and attempted to tweak the datetime format below
labels: {
	datetimeUTC: true,
	datetimeFormatter:{
		day: 'dd MMM',
		hour: 'HH:mm',
		
	},
},
title: {
text: 'DateTime'
}
},
yaxis: {
title: {
text: 'Temperature and Humidity'
},
min: 15,
max: 88,
},

legend: {
position: 'top',
horizontalAlign: 'right',
floating: true,
offsetY: -25,
offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
<div>

</div>

</body>
</html>


