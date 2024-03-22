<?php

/*MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "", "library");

    // Check connection

    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
      }


      $name = mysqli_real_escape_string($link, $_POST['bname']);
      $lent = mysqli_real_escape_string($link, $_POST['lentcon']); //lentcon meaning lent condition
      $lent_to = mysqli_real_escape_string($link, $_POST['lentname']); //name of the person who lended the book





        //  insert query execution
    $sql = "INSERT INTO books (Name, Lent, Lent_to) VALUES ('$name', '$lent', '$lent_to' )";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // close connection
    mysqli_close($link);

      ?>