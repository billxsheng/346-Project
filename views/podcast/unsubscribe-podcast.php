<!DOCTYPE html>
<html lang="en">
<b> <center>Unsubscribe to Podcast</center> </b> <br/>
<body>
    <form action="unsubscribe-podcast-handler.php" method="post">
        <label for="songTitle">Podcasts</label>
        <select name="podcast-id">
            <?php
                //Connecting to SQL via MySQLi API
                $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
                //query which retrieves all the podcasts that user is currently subscribed to so that they can unsubscribe
                $subscribedPodcasts = "SELECT * FROM subscribes NATURAL JOIN podcast WHERE user_ID = '11'";
                if ($result = $mysqli->query($subscribedPodcasts)) {
                    //loop which prints dropdown menu options to the HTML form
                    while ($row = $result->fetch_assoc()) {
                        $podcast_ID = $row["podcast_ID"];
                        $podcast_name = $row["podcast_name"];
                        echo '<option value="'.$podcast_ID.'">'.$podcast_ID.': '.$podcast_name.'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" name="unsubscribe" value="Unsubscribe"></input>
    </form>
</body>
</html>

