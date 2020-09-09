<?php
    //Connecting to SQL via MySQLi API
    $conn = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //defining parameters of query using data posted from the form
    $songTitle =  $_POST['songTitle'] ;
    $albumName = $_POST['albumName'];
    $lyrics = $_POST['lyrics'];
    $genre = $_POST['genre'];

    //query which inserts the new song with the respective arguments declared above
    $insertSong = "INSERT INTO song (song_ID, song_name, album_name, lyrics, user_ID, genre, duration_minutes, times_played)" 
    . "VALUES (24, '".$songTitle."' , '".$albumName."', '".$lyrics."', '1', '".$genre."', '10', 0)";

    //executes query
    if ($conn->multi_query($insertSong) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $insertSong . "<br>" . $conn->error;
    }

    // closes database connection
    $conn->close();
?>
