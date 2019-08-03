<?php
        //Connecting to SQL via MySQLi API
        $mysqli = new mysqli("localhost", "s46kang", "Spring@*%2019", "s46kang");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //query which gets the suggested podcasts of category 'Society & Culture' that the user has not subscribed to
        $suggestPodcasts = "SELECT * FROM subscribes NATURAL JOIN podcast WHERE podcast_category = 'Society & Culture' " 
        . "AND podcast_ID NOT IN (SELECT podcast_ID FROM subscribes NATURAL JOIN podcast WHERE user_ID = '11')";

        //executes query
        if ($result = $mysqli->query($suggestPodcasts)) {
            echo "<br/>
            <br/>
            <b> PODCASTS YOU MAY LIKE: SOCIETY & CULTURE </b> <br>";
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
                  $episodeQuery = "SELECT * FROM episode NATURAL JOIN podcast WHERE podcast_ID = " . $field1name;

                  if ($result2 = $mysqli->query($episodeQuery)) {
                      echo '
                      <tr> 
                          <td> <font face="Arial">Episode Number</font> </td> 
                          <td> <font face="Arial">Episode Description</font></td> 
                          <td> <font face="Arial">Datetime Released</font></td> 
                      </tr>';
                      //loop which prints the retrived tuples into a table
                      while ($row1 = $result2->fetch_assoc()) {
                          $field1name2 = $row1["episode_number"];
                          $field2name2 = $row1["episode_description"];
                          $field3name2 = $row1["datetime_released"];

                          echo '<center><tr> 
                            <td>'.$field1name2.'</td> 
                            <td>'.$field2name2.'</td> 
                            <td>'.$field3name2.'</td> 
                              </tr></center>';
                      }
                  }
            }     
        //frees associated memory   
        $result->free();
        }
      ?>   