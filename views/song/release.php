<!DOCTYPE html>
<html lang="en">
<b> <center>RELEASE</center> </b> <br/>
<!-- form which adds music to the song database table -->
<body>
    <form action="release-handler.php" method="post">
        <label for="songTitle">Song Title</label>
        <input type="text" name="songTitle"></input><br/>

        <label for="albumName">Album Name</label>
        <input type="text" name="albumName"></input><br/>

        <label for="lyrics">Lyrics</label>
        <input type="text" name="lyrics"></input><br/>

        <label for="genre">Genre</label>
        <input type="text" name="genre"></input><br/>

        <input type="submit" name="release" value="Release Song"></input>
    </form>
</body>
</html>
