<!DOCTYPE html>
<html lang="en">
<b> <center>Subscribe to Podcast</center> </b> <br/>
<body>
    <form action="subscribe-podcast-handler.php" method="post">
        <label for="songTitle">Podcasts</label>
        <select name="podcast-id">
            <?php
                //Connecting to SQL via MySQLi API
                $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
                //query that gets the podcasts that the user has not subscribed to
                $getUnsubscribedPodcasts = "SELECT * FROM podcast NATURAL JOIN subscribes WHERE podcast_ID "
                . "NOT IN (SELECT podcast_ID FROM subscribes NATURAL JOIN podcast WHERE user_ID = '11')";
                //executes query
                if ($result = $mysqli->query($getUnsubscribedPodcasts)) {
                    //loop which prints dropdown menu options to the HTML form
                    while ($row = $result->fetch_assoc()) {
                        $podcast_ID = $row["podcast_ID"];
                        $podcast_name = $row["podcast_name"];
                        echo '<option value="'.$podcast_ID.'">'.$podcast_ID.': '.$podcast_name.'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" name="subscribe" value="Subscribe"></input>
    </form>
</body>
</html>
