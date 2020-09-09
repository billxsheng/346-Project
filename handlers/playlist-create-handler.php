<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //Defining params for SQL query from form POST
    $playlistName =  $_POST['playlistName'] ;
    $playlistDescription = $_POST['playlistDescription'];
    $privacyType = $_POST['privacyType'];

    //query which inserts the new playlist into the playlist table with the arguments specified above
    $insertPlaylist = "INSERT INTO playlist (playlist_ID, playlist_name, playlist_description, privacy_type, number_tracks, user_ID) " 
    . "VALUES (25, '".$playlistName."' , '".$playlistDescription."', '".$privacyType."', 0, 11)";

    //executes query
    if ($conn->multi_query($insertPlaylist) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $insertPlaylist . "<br>" . $conn->error;
    }
    // closes database connection
    $conn->close();
?>
