<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //Defining params for SQL query from form POST
    $newPassword =  $_POST['password'] ;

    //Query which updates the user's password for the logged in user
    $updatePassword = "UPDATE user SET password='". $newPassword ."' WHERE user_ID = '11'"; 

    //executes query
    if ($conn->multi_query($updatePassword) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $updatePassword . "<br>" . $conn->error;
    }

    //closes database connection
    $conn->close();
?>
