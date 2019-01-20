function stringCheck()
{
    document.getElementById("email_error").innerHTML = ' ';
    document.getElementById("pass_error").innerHTML = ' ';


    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var regex_email = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/gm;
    
    var regex_pass = /^.*(?=.{6,})(?=.*[a-zA-Z])[a-zA-Z0-9]+$/gm;

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