<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/logreg.css" type="text/css" charset="utf-8">
<title>Password rest</title>
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
    <p><ceneter>Enter the 4 digit code we emailed you:</ceneter></p>

    <form action="verifyCode.php" method="post">
        <label for="code"><b>Code</b></label><br />
        <input type="text" id="code" name="code" placeholder="..."><br></br>
        <input type="submit" value="Send">
      </form> 
        </div>



        
        
    </div>
</body>
</html>