<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<?php session_start(); ?>

<?php
    require_once "../server/database_connection.php";
    
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $regex_email = '/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/';
        
        $regex_pass = "/^.*(?=.{6,})(?=.*[a-zA-Z])[a-zA-Z0-9]+$/";
        if(!preg_match($regex_email, $email))
        {
            echo '<script> 
            document.getElementById("email_error").innerHTML = "*Invalid Email";
            </script>';
        }

        if(!preg_match($regex_pass, $pass))
        {
            echo '<script> 
            document.getElementById("pass_error").innerHTML = "*Invalid password";
            </script>';
        }


        $sql = "SELECT  * FROM `users` WHERE user_email = '$email' AND  user_password = '$pass'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            header('Location: ../index.php'); 
        }
        else
        {
            echo '<script> 
            document.getElementById("pass_error").innerHTML = "*Email and Password does not match";
            </script>';

        }
    }
?>


<body style="height: 100vh; background: #F9F9F9;" class="d-flex justify-content-center align-items-center">

<div class="container">
    <form action="login.php" onsubmit="return stringCheck()" method ="POST">
        <div class="col-sm-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
            <div class="container">
                <div class="logo-container text-center mb-4">
                    <div class="logo d-inline font-20 margin-left-70"> <a href="<?php echo $domain.$root_folder."index.php"; ?>">HOSTEL</a></div>
                </div> 
                <div style="background:#ECECEC;" class="card mb-2">
                    <div class="card-header">
                        <h2 class="text-center"> Log<span>in</span>  </h2>
                    </div>
                    <div class="card-body">
						<div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input class="form-control" id= "email" type="text" name="email" placeholder ="Enter your Email" required>
                        </div>
						<span id= "email_error" class="text-danger"> </span> 
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input class="form-control" id= "password" type="password" name="password" placeholder="Password" required>
                        </div>
						<span id= "pass_error" class="text-danger"> </span> 
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" name= "login" class="btn btn-md btn-dark px-4"> Login </button>
                            <div class="mb-2"> <a href="<?php echo $domain.$root_folder."pages/forgot-password.php"; ?>"> <i class="fas fa-key"></i> Forgot your password?</a></div>                    
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center"> <a href="<?php echo $domain.$root_folder."pages/signup.php"; ?>"> <i class="fas fa-sign-in-alt"></i> Create a free Account</a></div>                  
                    </div>
                </div>
            </div>    
        </div>
    </form>
</div>


</body>
<?php include_once("../includes/footer.php"); ?>