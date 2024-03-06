
function validateForm() {

    document.getElementById("u").style.borderColor = "black";
    document.getElementById("p").style.borderColor = "black";

    document.getElementById("us").innerHTML = "";
    document.getElementById("ps").innerHTML = "";


    var uname = document.forms["login"]["uname"].value;
    var pword = document.forms["login"]["pword"].value;
    var count = 0;

    if (uname == "") {
        document.getElementById("u").style.borderColor = "red";
        document.getElementById("us").innerHTML = "Please enter your Username";
        count++;
    }

     if (pword == "") {
        document.getElementById("p").style.borderColor = "red";
        document.getElementById("ps").innerHTML = "Please enter your Password";
        count++;
    }

    if (count > 0) {
        
        return false;
    }
    return true;
  }
