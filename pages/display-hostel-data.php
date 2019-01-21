<?php session_start(); ?>
<?php include("../config.php");
        include_once("../server/functions.php"); ?>

<?php
    $id;
    if (isset($_GET["hostel_id"]))

        $id = $_GET["hostel_id"];
    else
        header("Location: ../index.php");
    include_once("../server/database_connection.php");

    $sql = "SELECT * FROM hostels WHERE hostel_id='$id'";
    $result = mysqli_query($conn, $sql);
    $num_results = mysqli_num_rows($result);

    if ($num_results == 0)
        header("Location: ../index.php");

    $assoc = mysqli_fetch_assoc($result);

    $images = getHostelImagesArray($conn, $id);

    $PAGE_TITLE = $assoc['hostel_name'];
?>
<?php include_once("../includes/header.php");?>

<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">

        <div class = "row">
            <div class="font-20 text-block padding-10 col-12"> <?php echo $assoc['hostel_name']; ?> </div>
        </div>

        <div class="row align-items-center">

            <div class="col-lg-5 col-md-6 col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">

                    <?php
                        for ($var = 0; $var < count($images); $var++)
                        {
                            $active = "";
                            if ($var == 0)
                                $active = "active";
                            echo "<li data-target='#carouselExampleIndicators' data-slide-to='$var' class='$active'></li>";
                        }
                    ?>

                  </ol>
                  <div class="carousel-inner">

                    <?php
                        for ($var = 0; $var < count($images); $var++)
                        {
                            echo "<div class='carousel-item active'>
                                  <img class='d-block w-100' src='../$images[$var]'>
                                </div>";
                        }
                    ?>

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-12">
                <table class="table table-striped">
                    <tr>
                        <th>Rooms Available</th>
                        <td> <?php echo $assoc['hostel_rooms']; ?> </td>
                    </tr>
                    <tr>
                        <th>Additional Facilities</th>
                        <td> <?php echo $assoc['hostel_extras']; ?> </td>
                    </tr>
                    <tr>
                        <th>Located in</th>
                        <td> <?php echo $assoc['hostel_city']; ?> </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td> <?php echo $assoc['hostel_address']; ?> </td>
                    </tr>
                    <tr>
                        <th>Owner Contact</th>
                        <td> <?php echo getHostelContact($conn, $id); ?> </td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td> <?php echo $assoc['hostel_rating']."&nbsp &nbsp &nbsp &nbsp".getStarsString($assoc['hostel_rating'], 5); ?> </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class = "row">
            <div class="font-20 text-block padding-10 col-12"> Reviews </div>
            <div class="col-12">
                <table class="table table-striped">
                    <tr>
                        <th>User Name <div class="font-12">Rating: rating</div></th>
                        <td> It sucks </td>
                    </tr>
                    <tr>
                        <th>User Name <div class="font-12">Rating: rating</div></th>
                        <td> Good Enough </td>
                    </tr>
                    <tr>
                        <th>User Name <div class="font-12">Rating: rating</div></th>
                        <td> 100% would not recommend. </td>
                    </tr>
                </table>
            </div>
        </div>

     </div>

     <footer>
        <div class='container text-center py-2 py-md-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>
    


<?php include_once("../includes/footer.php"); ?>