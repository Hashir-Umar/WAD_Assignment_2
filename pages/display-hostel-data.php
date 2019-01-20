<?php include("../config.php");?>
<?php include_once("../includes/header.php"); ?>
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
?>
<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">

        <div class = "row">
            <div class="font-20 text-block padding-10 col-12"> Name </div>
        </div>

        <div class="row align-items-center">

            <div class="col-5"><img alt="hostel_image" class="img-fluid" src="../src/hostel_images/1_1.jpg"></div>

            <div class="col-7">
                <table class="table table-striped">
                    <tr>
                        <th>Rooms Available</th>
                        <td> 30 </td>
                    </tr>
                    <tr>
                        <th>Additional Facilities</th>
                        <td> 456465ddf </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td> 456465ddf </td>
                    </tr>
                    <tr>
                        <th>Owner Contact</th>
                        <td> 456465ddf </td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td> 456465ddf </td>
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