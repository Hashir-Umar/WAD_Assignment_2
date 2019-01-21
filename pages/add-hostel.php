<?php session_start(); ?>
<?php
    if(!isset($_SESSION['user_account_type']))
    {
        header("Location: ../index.php");
    }
?>
<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">
        <?php
            if(isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg']))
            {
                $msg = $_SESSION['error_msg'];
                if(!preg_match('/successfully/',  $msg))
                {
                    echo "<div class='alert alert-danger mt-4' role='alert'>";
                    echo "<strong>Error: </strong>"; 
                        echo $msg;
                    echo "</div>";
                }
                else
                {
                    echo "<div class='alert alert-success alert-dismissible fade show mt-4' role='alert'>";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo $msg;
                    echo "</div>";
                }

                $_SESSION['error_msg'] = "";
            }
        ?>
        <h1 class="text-center my-4"> Add Your Hostel</h1>
         <form name = "uploadHostel" action = "<?php echo $domain.$root_folder."server/validateForms.php"; ?>" method = "POST" enctype = "multipart/form-data">
            <div class="row">
                <div class="col-12 offset-md-2 col-md-8 col-lg-/">
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                        </div>
                        <input class="form-control" type="text" name="hostel_name" placeholder="Hostel name" >
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-city"></i></div>
                        </div>
                        <select class="form-control" id="City" name="hostel_city" >
                            <option value="" disabled selected>Select your City</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Islamabad">Islamabad</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Faisalabad">Faisalabad</option>
                            <option value="Peshawar">Peshawar</option>
                            <option value="Quetta">Quetta</option>
                        </select>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                        </div>
                        <input class="form-control" type="text" name="hostel_address" placeholder ="Address" >
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-door-open"></i></div>
                        </div>
                        <input class="form-control" type="number" name="hostel_rooms" placeholder="Rooms Available" >
                    </div>

                    <textarea name="hostel_extras" placeholder="Additional Facilities" class="col-12" rows="5"></textarea>
                    
                     <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
                    <div class="input-group-text mb-2"><i class="far fa-images"></i>&nbsp Select an image<input name = "user_file" id = "file" class = "btn" type = "file" ></div>
                   
                    
                    <button type="submit" name="uploadHostel" class="btn btn-block btn-outline-dark mb-1 mb-md-2"> Add Hostel </button>
                    
                </div>
            </div> 
         </form>
     </div>

     <footer>
        <div class='container text-center py-2 py-md-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>
    


<?php include_once("../includes/footer.php"); ?>