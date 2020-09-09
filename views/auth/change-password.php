<!DOCTYPE html>
<html lang="en">
<b> <center>Change Password</center> </b> <br/>
<body>
    <!-- form that changes password of currently logged in user -->
    <form action="change-password-handler.php" method="post">
        <label for="password">New Password</label>
        <input type="text" name="password"></input><br/>
        <!-- submit button submits POST request and executes action PHP file -->
        <input type="submit" name="change" value="Change Password"></input>
    </form>
</body>
</html>
