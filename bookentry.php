<?php

    /* MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "", "library");

    // Check connection

    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
      }

    // Escape user inputs for security
    $name = mysqli_real_escape_string($link, $_POST['bname']);
    $author  = mysqli_real_escape_string($link, $_POST['author']);
    $genre = mysqli_real_escape_string($link, $_POST['genre']);
    $isbn = mysqli_real_escape_string($link, $_POST['isbn']);
    $edition = mysqli_real_escape_string($link, $_POST['edition']);
    $publisher = mysqli_real_escape_string($link, $_POST['publisher']);
    $dop = mysqli_real_escape_string($link, $_POST['dop']);
    

    // insert query execution
    $sql = "INSERT INTO books (Name, Author, Genre, ISBN, Edition, Publisher, Date_of_Publication ) VALUES ('$name', '$author', '$genre', '$isbn', '$edition', '$publisher', '$dop')";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // close connection
    mysqli_close($link);
 
?>