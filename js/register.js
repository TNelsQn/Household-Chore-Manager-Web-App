
function validateForm() {

    document.getElementById("u").style.borderColor = "black";
    document.getElementById("e").style.borderColor = "black";
    document.getElementById("p").style.borderColor = "black";
    document.getElementById("pc").style.borderColor = "black";

    document.getElementById("us").innerHTML = "";
    document.getElementById("es").innerHTML = "";
    document.getElementById("ps").innerHTML = "";
    document.getElementById("pcs").innerHTML = "";

    var uname = document.forms["reg"]["uname"].value;
    var email = document.forms["reg"]["email"].value;
    var pword = document.forms["reg"]["pword"].value;
    var pconf = document.forms["reg"]["pwordconf"].value;
    var count = 0;

    if (pconf != pword) {
        document.getElementById("p").style.borderColor = "red";
        document.getElementById("pc").style.borderColor = "red";
        document.getElementById("ps").innerHTML = "Passwords dont match";
        document.getElementById("pcs").innerHTML = "Passwords dont match";
        count++;
    }

    if (uname == "") {
        document.getElementById("u").style.borderColor = "red";
        document.getElementById("us").innerHTML = "Please enter your Username";
        count++;
    }
    
    if (email == "") {
        document.getElementById("e").style.borderColor = "red";
        document.getElementById("es").innerHTML = "Please enter your email address";
        count++;
    }

     if (pword == "") {
        document.getElementById("p").style.borderColor = "red";
        document.getElementById("ps").innerHTML = "Please enter your Password";
        count++;
    }

     if (pconf == "") {
        document.getElementById("pc").style.borderColor = "red";
        document.getElementById("pcs").innerHTML = "Please confirm your password";
        count++;
    }
    if (count > 0) {
        
        return false;
    }
    return true;
  }
