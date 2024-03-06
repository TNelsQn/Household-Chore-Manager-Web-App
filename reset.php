<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/logreg.css" type="text/css" charset="utf-8">
<title>Home</title>
</head>
<body>
    <div class="main">

        <div class="header">
            <div class="logo2">
                <img src="css/istockphoto-1148287574-612x612.jpg" alt="logo" width="100%" height="100%"> 
            </div>
        </div>

        <div class="passwordReset">
            <br></br>

            <h1><center>Password Reset</center></h1>
    <p><ceneter>What would you like your new password to be?</ceneter></p>

    <form action="passChange.php" method="post">
        <label for="password"><b>Password:</b></label><br />
        <input type="password" id="password" name="password" placeholder="Password"><br></br>
        <input type="hidden" id="code" name="code" value="<?php echo $_GET["code"]; ?>"><br></br>
        <input type="submit" value="Send">
      </form> 
        </div>



        
        
    </div>
</body>
</html>