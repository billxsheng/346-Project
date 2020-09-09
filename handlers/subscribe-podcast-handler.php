<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //defining parameters of query using data posted from the form
    $podcast =  $_POST['podcast-id'] ;

    // query which subscribes the user to the respective podcast (adds tuple in subscribes table)
    $subscribe = "INSERT INTO subscribes (user_ID, podcast_ID)" 
    . "VALUES (11, '".$podcast."')";

    //executes query
    if ($conn->multi_query($subscribe) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $subscribe . "<br>" . $conn->error;
    }

    //closes db connection
    $conn->close();
?>
