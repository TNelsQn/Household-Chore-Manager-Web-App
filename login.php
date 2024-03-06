<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/logreg.css" type="text/css" charset="utf-8">
<title>Home</title>
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
</head>
<body>
    <div class="main">

        <div class="header">
            <div class="logo2">
                <img src="css/istockphoto-1148287574-612x612.jpg" alt="logo" width="100%" height="100%">
            </div>
        </div>

        <div class="login">
            <br></br>

            <form name="login" id="login" action="log.php" method="post">
                <label for="uname"><b>Username</b></label><br />
                <input id="u" type="text" id="uname" name="uname" placeholder="Username"><br />
                <p id = "us" style = "color: red"></p>
                <label for="pword"><b>Password</b></label><br>
                <input id="p" type="password" id="pword" name="pword" placeholder="Password"><br>
                <p id = "ps" style="color: red"></p>
                <a href="forgotPassword.html">Forgot your password?</a><br></br>
                <input type="submit" value="Login" onclick="return validateForm()">
              </form>
              <hr><br>
        
              <p><b><center>Don't have an account?</center></b></p>
              <form action="register.php">
                <input type="submit" value="Register" />
            </form>
        </div>
        
        
    </div>
</body>
</html>

<?php
if(isset($_GET['error'])) {
        return alert("Error, something went wrong.  Please try again.");   
}

function alert ($string) {
        echo "<script type='text/javascript'>alert('$string');</script>";    
}
?>