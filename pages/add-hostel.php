<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">
        <h1 class="text-center my-4"> Add Your Hostel</h1>
         <form name = "uploadHostel" action = "uploadHostel.php" method = "POST" enctype = "multipart/form-data">
            <div class="row">
                <div class="col-sm-12 offset-md-3 col-md-6 col-lg-6">
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                        </div>
                        <input class="form-control" type="text" name="hostel_name" placeholder="Hostel name" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-city"></i></div>
                        </div>
                        <select class="form-control" id="City" name="City" required>
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
                        <input class="form-control" type="text" name="address" placeholder ="Address" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-door-open"></i></div>
                        </div>
                        <input class="form-control" type="number" name="rooms" placeholder="Rooms Available" required>
                    </div>

                    <textarea name="extras" placeholder="Additional Facilities" class="col-12" rows="5"></textarea>
                    
                    <div class="input-group mb-1 mb-md-2 input-group-prepend">
                        <div class="input-group-text"><i class="far fa-images"></i>&nbsp Select an image<input name = "user_file" id = "file" class = "btn" type = "file" required></div>
                    </div>
                    
                    <button id=btn type="submit" class="btn btn-block btn-outline-dark mb-1 mb-md-2"> Add Hostel </button>
                    
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