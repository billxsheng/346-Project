<!DOCTYPE html>
<html lang="en">
  <body>
    <b> <center>PODCASTS</center> </b> <br>
    <a href="subscribe-podcast.php">Subscribe to Podcast</a><br/>
    <a href="unsubscribe-podcast.php">Unsubscribe to Podcast</a><br/>
    <a href="podcast-suggestions.php">Podcast Suggestions</a><br/>
      <?php
        //Connecting to SQL via MySQLi API
        $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //query which gets the podcasts the currently logged in user is subscribed to
        $getSubscribedPodcasts = "SELECT * FROM podcast NATURAL JOIN subscribes WHERE user_ID='11'";

        //executes query
        if ($result = $mysqli->query($getSubscribedPodcasts)) {
            echo "<b> SUBSCRIBED PODCASTS </b> <br>";
            //loop which prints the retrived tuples into a table
            while ($row = $result->fetch_assoc()) {
              echo '<table border="1" cellspacing="2" cellpadding="2"> 
              <tr> 
                <td> <font face="Arial">Podcast ID</font> </td> 
                <td> <font face="Arial">Name</font> </td> 
                <td> <font face="Arial">Category</font> </td> 
                <td> <font face="Arial">Host</font> </td> 
                <td> <font face="Arial">Description</font> </td> 
              </tr>';
              
                $field1name = $row["podcast_ID"];
                $field2name = $row["podcast_name"];
                $field3name = $row["podcast_category"];
                $field4name = $row["podcast_host"];
                $field5name = $row["podcast_description"];

                echo '<center><tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                </tr></center>';

                //query that retrives the episodes in each podcast
                $episodeQuery = "SELECT * FROM episode NATURAL JOIN podcast WHERE podcast_ID =  " . $field1name;

                if ($result2 = $mysqli->query($episodeQuery)) {
                    echo '
                    <tr> 
                        <td> <font face="Arial">Episode Number</font> </td> 
                        <td> <font face="Arial">Episode Description</font></td> 
                        <td> <font face="Arial">Datetime Released</font></td> 
                    </tr>';
                  //loop which prints the retrived tuples into a table
                    while ($row1 = $result2->fetch_assoc()) {
                        $episode_number = $row1["episode_number"];
                        $episode_description = $row1["episode_description"];
                        $datetime_released = $row1["datetime_released"];

                        echo '<center><tr> 
                          <td>'.$episode_number.'</td> 
                          <td>'.$episode_description.'</td> 
                          <td>'.$datetime_released.'</td> 
                            </tr></center>';
                    }
                }
            }     
        //frees associated memory   
        $result->free();
        
        }
      ?>    
  </body>
</html>
