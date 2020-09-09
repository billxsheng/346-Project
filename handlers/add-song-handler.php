<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } 

    //Defining params for SQL query from form POST
    $playlistID =  $_POST['playlist-id'] ;
    $songID =  $_POST['song-id'] ;

    //Adds a song to a playlist in 'adds' table for logged in user 
    $addSongQuery = "INSERT INTO adds (user_ID, playlist_ID, song_ID)" 
    . "VALUES (11, '".$playlistID."' , '".$songID."');";

    //Increments number of tracks value 
    $addSongQuery .= "UPDATE playlist SET number_tracks = number_tracks + 1 WHERE playlist_ID = " . $playlistID;

    //Execute query
    if ($conn->multi_query($addSongQuery) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $addSongQuery . "<br>" . $conn->error;
    }
    //db connection closes
    $conn->close();
?>
