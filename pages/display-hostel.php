<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
<?php
    $city;
    if (isset($_GET["city"]))

        $city = $_GET["city"];
    else
        $city = "";
    include_once("../server/database_connection.php");

    $sql = "SELECT * FROM hostels WHERE hostel_city='$city'";
    $result = mysqli_query($conn, $sql);
    $num_results = mysqli_num_rows($result);
    $assoc = mysqli_fetch_assoc($result);
?>
<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">

        <br><br>

        <form method="GET" action="display-hostel.php">
            <div class="row">
                <div class="input-group mb-1 mb-md-2 col-10">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-city"></i></div>
                    </div>
                    <select class="form-control" id="City" name="city" required>
                        <option value="" disabled <?php if ($city == ""){echo "selected";} ?> >Select your City</option>
                        <option value="Lahore" <?php if ($city == "Lahore"){echo "selected";} ?> >Lahore</option>
                        <option value="Islamabad" <?php if ($city == "Islamabad"){echo "selected";} ?> >Islamabad</option>
                        <option value="Karachi" <?php if ($city == "Karachi"){echo "selected";} ?> >Karachi</option>
                        <option value="Faisalabad" <?php if ($city == "Faisalabad"){echo "selected";} ?> >Faisalabad</option>
                        <option value="Peshawar" <?php if ($city == "Peshawar"){echo "selected";} ?> >Peshawar</option>
                        <option value="Quetta" <?php if ($city == "Quetta"){echo "selected";} ?> >Quetta</option>
                    </select>
                </div>
                <button id="btn" type="submit" class="btn btn-block btn-outline-dark mb-1 mb-md-2 col-2"> Search </button>
            </div>
        </form>

        <div class="text-block font-15 padding-10"> Results: <?php echo "$num_results" ?> </div>

        <div class="row">
            <?php
                for ($i = 0; $i < $num_results; $i++)
                {
                    $name = $assoc['hostel_name'];
                    $image = "../".$assoc['hostel_img'];
                    $hostel_id = $assoc['hostel_id'];

                    echo "<div class='text-center margin-top-10 col-sm-6 col-12 col-md-4'><div class='image-holder'><img alt='$name' class='img-fluid image-block' src='$image'></div><div class='font-15 text-block padding-10'> $name </div></div>";
                }
            ?>
            <!--<div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="font-15 text-block padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div>
            <div class="text-center margin-top-10 col-sm-6 col-12 col-md-4"><div class="image-holder"><img alt="hostel_image" class="img-fluid image-block" src="../src/hostel_images/1_1.jpg"></div><div class="text-block font-15 padding-10"> Name </div></div> -->
        </div>

     </div>

     <footer>
        <div class='container text-center py-2 py-md-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>
    


<?php include_once("../includes/footer.php"); ?>