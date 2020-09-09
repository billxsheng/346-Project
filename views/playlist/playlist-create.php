<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            // form where user can specify playlist information for creation
            echo "<b> <center>CREATE PLAYLIST</center> </b> <br>";
            // submits form, sends POST request and executes action PHP file
            echo '<body>
                <form action="playlist-create-handler.php" method="POST">
                    <label for="playlistName">Playlist Name</label>
                    <input type="text" name="playlistName"></input><br/>

                    <label for="playlistDescription">Playlist Description</label>
                    <input type="text" name="playlistDescription"></input><br/>

                    <label for="privacyType">Privacy Type</label>
                    <input type="radio" name="privacyType" value="Public">Public</Input> 
                    <input type="radio" name="privacyType" value="Private">Private</Input><br/>
                    <input type="submit" value="Create New Playlist"></input>
                </form>
            </body>';
        ?>
    </body>
</html>
