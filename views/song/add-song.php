<!DOCTYPE html>
<html lang="en">
<b> <center>Add Song to Playlist</center> </b> <br/>
<body>
    <!-- Form that adds a song to a playlist, POST action executes to another PHP file  -->
    <form action="add-song-handler.php" method="post">
        <label for="songTitle">Playlist</label>
        <!-- Dropdown selection menu which specifies the playlist the song will be added to -->
        <select name="playlist-id">
            <?php
                //Connecting to SQL via MySQLi API
                $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
                //Query which retrieves the data of the playlists created by the user 
                $getPersonalPlaylistsQuery = "SELECT * FROM playlist NATURAL JOIN user WHERE user_ID = '11'";
                //Executes query and a while loop which assigns each tuple to a dropdown menu options
                if ($result = $mysqli->query($getPersonalPlaylistsQuery)) {
                    while ($row = $result->fetch_assoc()) {
                        $playlistID = $row["playlist_ID"];
                        $playlistName = $row["playlist_name"];
                        echo '<option value="'.$playlistID.'">'.$playlistID.': '.$playlistName.'</option>';
                    }
                }
            ?>
        </select>
        <br/>
        <br/>
        <label for="songTitle">Song</label>
        <!-- Dropdown selection menu which specifies the song that will be added to the playlist -->
        <select name="song-id">
            <?php
                //Connecting to SQL via MySQLi API
                $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
                //Query which gets all songs available
                $getAllSongsQuery = "SELECT * FROM song NATURAL JOIN user NATURAL JOIN artist";
                //Executes query and a while loop which assigns each tuple to a dropdown menu options
                if ($result = $mysqli->query($getAllSongsQuery)) {
                    while ($row = $result->fetch_assoc()) {
                        $songID = $row["song_ID"];
                        $songName = $row["song_name"];
                        $songArtistName = $row["artist_name"];
                        echo '<option value="'.$songID.'">'.$songID.': '.$songName. ' | '. $songArtistName. '</option>';
                    }
                }
            ?>
        </select>
        <br/>
        <br/>
        <!-- Submit button which sends POST action and executes PHP file -->
        <input type="submit" name="add" value="Add"></input>
    </form>
</body>
</html>
