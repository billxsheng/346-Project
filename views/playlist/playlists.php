<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
        echo "<b> <center>PLAYLISTS</center> </b> <br/>";
        echo '<a href="playlist-create.php">Create Playlist</a><br/>';
        echo '<a href="add-song.php">Add To Playlist</a><br/>';
        ?>
        <?php
            //Connecting to SQL via MySQLi API
            $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            //Query which selects all the playlists created by logged in user 
            $getUserPlaylists = "SELECT * FROM playlist NATURAL JOIN user WHERE user_ID = '11'";

            //executes query
            if ($result = $mysqli->query($getUserPlaylists)) {
                echo "<b> YOUR PLAYLISTS </b> <br>";
                //loop which prints the retrived tuples into a table
                while ($row = $result->fetch_assoc()) {
                    echo '<table border="1" cellspacing="2" cellpadding="2">
                <tr> 
                <td> <font face="Arial">Playlist ID</font> </td> 
                <td> <font face="Arial">Playlist Name</font> </td> 
                <td> <font face="Arial">Playlist Description</font> </td> 
                <td> <font face="Arial">Privacy Type</font> </td> 
                <td> <font face="Arial">Number of Tracks</font> </td> 
                <td> <font face="Arial">Datetime Created</font> </td> 
                </tr>';
                
                    $field1name = $row["playlist_ID"];
                    $field2name = $row["playlist_name"];
                    $field3name = $row["playlist_description"];
                    $field4name = $row["privacy_type"];
                    $field5name = $row["number_tracks"];
                    $field6name = $row["datetime_created"];

                    echo '<center><tr> 
                    <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
                    <td>'.$field6name.'</td> 
                    </tr></center>';
                    //query which retrives the songs added in the referenced playlist
                    $songQuery = "SELECT * FROM song s INNER JOIN adds a ON s.song_ID = a.song_ID WHERE playlist_ID = " . $field1name;
                    if ($result2 = $mysqli->query($songQuery)) {
                        echo '
                        <tr> 
                        <td> <font face="Arial">Song ID</font> </td> 
                        <td> <font face="Arial">Song Name</font> </td> 
                        <td> <font face="Arial">Album Name</font> </td> 
                        <td> <font face="Arial">Lyrics</font> </td> 
                        <td> <font face="Arial">Genre</font> </td> 
                        <td> <font face="Arial">Duration (Minutes)</font> </td> 
                        </tr>';
                    //loop which prints the retrived tuples into a table
                    while ($row1 = $result2->fetch_assoc()) {
                        $song_ID = $row1["song_ID"];
                        $song_name = $row1["song_name"];
                        $album_name = $row1["album_name"];
                        $lyrics = $row1["lyrics"];
                        $genre = $row1["genre"];
                        $duration_minutes = $row1["duration_minutes"];

                        echo '<center><tr> 
                        <td>'.$song_ID.'</td> 
                        <td>'.$song_name.'</td> 
                        <td>'.$album_name.'</td> 
                        <td>'.$lyrics.'</td> 
                        <td>'.$genre.'</td> 
                        <td>'.$duration_minutes.'</td> 
                        </tr></center>';
                    }
                }
            }     
            //frees associated memory
            $result->free();
            }
            echo '</table>';
        ?>    

        <?php
            //Connecting to SQL via MySQLi API
            $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            //query which gets all public playlists not created by the logged in user
            $getPublicPlaylists = "SELECT * FROM playlist NATURAL JOIN user WHERE privacy_type = 'Public' AND user_ID <> '11'";

           
            //executes query
            if ($result = $mysqli->query($getPublicPlaylists)) {
                echo "<br/><br/><b> OTHER PLAYLISTS YOU MAY LIKE </b> <br>";
                //loop which prints the retrived tuples into a table
                while ($row = $result->fetch_assoc()) {
                    echo '<table border="1" cellspacing="2" cellpadding="2">
                    <tr> 
                        <td> <font face="Arial">Playlist ID</font> </td> 
                        <td> <font face="Arial">Playlist Name</font> </td> 
                        <td> <font face="Arial">Playlist Description</font> </td> 
                        <td> <font face="Arial">Privacy Type</font> </td> 
                        <td> <font face="Arial">Number of Tracks</font> </td> 
                        <td> <font face="Arial">Datetime Created</font> </td> 
                    </tr>';
                    $field1name2 = $row["playlist_ID"];
                    $field2name2 = $row["playlist_name"];
                    $field3name2 = $row["playlist_description"];
                    $field4name2 = $row["privacy_type"];
                    $field5name2 = $row["number_tracks"];
                    $field6name2 = $row["datetime_created"];

                    echo '<center><tr> 
                    <td>'.$field1name2.'</td> 
                    <td>'.$field2name2.'</td> 
                    <td>'.$field3name2.'</td> 
                    <td>'.$field4name2.'</td> 
                    <td>'.$field5name2.'</td> 
                    <td>'.$field6name2.'</td> 
                        </tr></center>';
                    
                    //query which retrives the songs added in the referenced playlist
                    $songQuery = "SELECT * FROM song s INNER JOIN adds a ON s.song_ID = a.song_ID WHERE playlist_ID = " . $field1name2;
                   
                    if ($result2 = $mysqli->query($songQuery)) {
                        echo '
                        <tr> 
                            <td> <font face="Arial">Song ID</font> </td> 
                            <td> <font face="Arial">Song Name</font> </td> 
                            <td> <font face="Arial">Album Name</font> </td> 
                            <td> <font face="Arial">Lyrics</font> </td> 
                            <td> <font face="Arial">Genre</font> </td> 
                            <td> <font face="Arial">Duration (Minutes)</font> </td> 
                        </tr>';
                        //loop which prints the retrived tuples into a table
                        while ($row1 = $result2->fetch_assoc()) {
                            $field1namesong = $row1["song_ID"];
                            $field2namesong = $row1["song_name"];
                            $field3namesong = $row1["album_name"];
                            $field4namesong = $row1["lyrics"];
                            $field5namesong = $row1["genre"];
                            $field6namesong = $row1["duration_minutes"];
            
                            echo '<center><tr> 
                            <td>'.$field1namesong.'</td> 
                            <td>'.$field2namesong.'</td> 
                            <td>'.$field3namesong.'</td> 
                            <td>'.$field4namesong.'</td> 
                            <td>'.$field5namesong.'</td> 
                            <td>'.$field6namesong.'</td> 
                                </tr></center>';
                        }
                    }
                }  
            //frees associated memory   
            $result->free();
            }
            echo '</table>';
        ?>    
    </body>
</html>
