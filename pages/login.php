<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<body style="height: 100vh; background: #F9F9F9;" class="d-flex justify-content-center align-items-center">

<div class="container">
    <form action="login.php" method="get">
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
                            <input class="form-control" type="text" name="email" placeholder ="Enter your Email" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" class="btn btn-md btn-dark px-4"> Login </button>
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


<?php include_once("../includes/footer.php"); ?>