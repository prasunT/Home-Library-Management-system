<?php

$name = $_POST["bname"];
$publisher = $_POST["publisher"];



$servername = "localhost";
$username = "root";
$password = "";
$db = "library";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "UPDATE books SET Publisher='$publisher' WHERE Name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$publisher;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>