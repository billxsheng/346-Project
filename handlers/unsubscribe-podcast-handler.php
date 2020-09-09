<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //defining parameters of query using data posted from the form
    $podcast =  $_POST['podcast-id'] ;

    // query which unsubscribes the user from the respective podcast (removes tuple in subscribes table)
    $unsubscribe = "DELETE FROM subscribes " 
    . "WHERE user_ID = '11' and podcast_ID = " . $podcast;

    //executes query
    if ($conn->multi_query($unsubscribe) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $unsubscribe . "<br>" . $conn->error;
    }

    //closes database connection
    $conn->close();
?>
