﻿<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<body style="height: 100vh; background: #F9F9F9;" class="d-flex justify-content-center align-items-center">

<div class="container">
    <form action="#">
        <div class="col-sm-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
            <div class="container">
                <div class="logo-container text-center mb-4">
                    <div class="logo d-inline font-20 margin-left-70"> <a href="<?php echo $domain.$root_folder."index.php"; ?>">HOSTEL</a></div>
                </div> 
                <div style="background:#ECECEC;" class="card mb-2">
                    <div class="card-header">
                        <h1 class="text-center"> Sign<span>up </span></h1>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="first_name" placeholder="first name" required>
                        </div>
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="last_name" placeholder="last name" required>
                        </div>
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-mars"></i></div>
                            </div>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input class="form-control" type="text" name="email" placeholder ="Enter your Email" required>
                        </div>
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-1 mb-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm your password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" class="btn btn-md btn-dark px-4"> Register </button>
                            <div class="mb-2"> 
                                <input type="checkbox" name="user_account_type" value="1"> Are you an owner of Hostels?<br>
                            </div>                
                        </div>      
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center"> <a href="<?php echo $domain.$root_folder."pages/login.php"; ?>"> <i class="fas fa-sign-in-alt"></i>Already Have An Account?</a></div> 
                    </div>
                </div>
            </div>    
        </div>
    </form>
</div>


<?php include_once("../includes/footer.php"); ?>