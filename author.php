<?php

$name = $_POST["bname"];
$author = $_POST["author"];



$servername = "localhost";
$username = "root";
$password = "";
$db = "library";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "UPDATE books SET Author='$author' WHERE Name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$author;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>