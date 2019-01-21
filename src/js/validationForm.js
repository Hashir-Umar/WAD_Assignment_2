function stringCheck()
{
    document.getElementById("email_error").innerHTML = ' ';
    document.getElementById("pass_error").innerHTML = ' ';


    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var regex_email = /^[A-Za-z0-9]+\.?[A-Za-z0-9]+\@[a-z0-9]+\.[a-z]{2,4}(\.[a-z]{2,4})?$/gm;
    
    //var regex_pass = /^.*(?=.{6,})(?=.*[a-zA-Z])[a-zA-Z0-9]+$/gm;
    var regex_pass = /^\d+/;

    var email_match = email.match(regex_email);
    var pass_match = password.match(regex_pass);

    if (email_match == null) {
        document.getElementById("email_error").innerHTML = '*Enter valid Email';
        return false;
    }
    
    if (pass_match == null) {
        document.getElementById("pass_error").innerHTML = '*Enter valid password';
        return false;
    }
    return true;
}



function validateEmail(email) {
  var result = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return result.test(email);
}

function validatePassword(password) {
    var result=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    return result.test(password);
  }

function handleChange(checkbox) {
    var div = document.getElementById("phone_div");
    var phn = document.getElementById("phone");

    if(checkbox.checked == true){
        phn.style.display = "block";
        div.style.display = "block";
        phn.value = "";
    }
    else
    {
        phn.style.display = "none";
        div.style.display = "none"; 
        phn.value = "";

    }
}

function validate() {
    document.getElementById("email_error").innerHTML = ' ';
    document.getElementById("pass_error").innerHTML = ' ';
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");

    var email_res = validateEmail(email.value);
    var password_res = validatePassword(password.value)

    if(!email_res)
    {
        email.style.borderColor = "red";
        document.getElementById("email_error").innerHTML = '*Enter valid Email';
        return false;
    }
    else if(email.value == "")
    {
        email.style.borderColor = "red";
        document.getElementById("email_error").innerHTML = '*Field Required';
        return false;
    }
    else if(password.value == "")
    {
        password.style.borderColor = "red";
        document.getElementById("pass_error").innerHTML = '*Field Required';
        return false;
    }
    else if(!password_res)
     {
        password.style.borderColor = "red";
        document.getElementById("pass_error").innerHTML = '*Enter valid password';
        return false;
    }
    else if(password.value != confirm_password.value)
    {
        confirm_password.style.borderColor = "red";
        document.getElementById("cnfrm_pass_error").innerHTML  = "Password Mismatch!";
        return false;
    }

    return true;
}