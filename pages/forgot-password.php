<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<body>

    <nav class="navbar navbar-expand-md py-4">
        <div class="wrapper">
            <span class="logo ml-5">HOSTEL</span>
        </div>
    </nav>

<div class="container">
    <h2 class="text-center my-4"> Reset your password </h2>
    <form action="../index.php" method="post">
        <div class="row">
            <div class="col-sm-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                    <input class="form-control" type="text" name="email" value ="Dummy@xyz.com" readonly>
                </div>
                <div class="input-group  mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                <input class="form-control" type="password" name="password" placeholder="Enter New Password" required>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <button  id="btn" type="submit" class="btn btn-block btn-outline-dark mb-2" > Reset password </button>
            </div>
        </div>
         
        <div class="row mt-5">
            <div class="col-sm-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                <a href="../index.php"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to Home</a>
            </div>
        </div> 
    </form>
</div>

    <footer>
        <div class='container text-center py-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>


<?php include_once("../includes/footer.php"); ?>