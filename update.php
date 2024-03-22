<?php

$name = $_POST["bname"];
$lent = $_POST["lent"];
$lent_to = $_POST["lent_to"];


$servername = "localhost";
$username = "root";
$password = "";
$db = "library";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "UPDATE books SET Lent='$lent', Lent_to='$lent_to' WHERE Name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$lent."-".$lent_to;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>