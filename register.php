<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/logreg.css" type="text/css" charset="utf-8">
<title>Home</title>
<script src="js/jquery.js"></script>
<script src="js/register.js"></script>
</head>
<body>
    <div class="main">

        <div class="login">

        <div class="header">
            <div class="logo2">
                <img src="css/istockphoto-1148287574-612x612.jpg" alt="logo" width="100%" height="100%">
            </div>
        </div>
        <br>


            <center><h2>Sign up for free to start getting on top of those deadlines</h2></center>
            
            <form name="reg" id="reg" action="reg.php" method="post">
                <label for="uname"><b>Whats you username?</b></label><br />
                <input id="u" type="text" id="uname" name="uname" placeholder="Username">
                <p id="us" style = "color:red"></p>
                <label for="email"><b>Whats your email?</b></label><br>
                <input id="e" type="text" id="email" name="email" placeholder="Email adress">
                <p id="es" style = "color:red"></p>
                <label for="pword"><b>Create a password</b></label><br>
                <input id="p" type="password" id="pword" name="pword" placeholder="Password">
                <p id="ps" style = "color:red"></p>
                <label for="pwordconf"><b>Confirm Password</b></label><br />
                <input id="pc" type="password" id="pwordconf" name="pwordconf" placeholder="Confirm password">
                <p id="pcs" style = "color:red"></p>
                <input type="submit" id="submit" name="submit" value="register" onclick="return validateForm()">
              </form> 

              <p><b>Already have an account? <a href = "login.php">Log in</a></b></a>

        </div>



        
        
    </div>
</body>
</html>

<?php
if(isset($_GET['error'])) {
    return alert("Error, User already exists.  Please try again.");   
}

function alert ($string) {
    echo "<script type='text/javascript'>alert('$string');</script>";    
}
?>