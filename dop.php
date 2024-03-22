<?php

$name = $_POST["bname"];
$dop = $_POST["Date_of_Publication"];



$servername = "localhost";
$username = "root";
$password = "";
$db = "library";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "UPDATE books SET Date_of_Publication='$dop' WHERE Name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$dop;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>