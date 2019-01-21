<?php session_start(); ?>
<?php include("../config.php");?>

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

    $PAGE_TITLE = $city;
?>

<?php include_once("../includes/header.php");
      include_once("../server/functions.php"); ?>

<?php
  $account_type = 0;
  if(isset($_SESSION['user_account_type']) && $_SESSION['user_account_type'] == 1)
  {
    $account_type = 1;
  }
  else if(isset($_SESSION['user_account_type']) && $_SESSION['user_account_type'] == 2)
  {
    $account_type = 2;
  }
  else if(isset($_SESSION['user_account_type']) && $_SESSION['user_account_type'] == 3)
  {
    $account_type = 3;
  }
  
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
                    $assoc = mysqli_fetch_assoc($result);
                    $name = $assoc['hostel_name'];
                    $image = "../".$assoc['hostel_img'];
                    $hostel_id = $assoc['hostel_id'];
                    $rating = $assoc['hostel_rating'];
                    $link = "display-hostel-data.php?hostel_id=$hostel_id";

                    $stars = getStarsString($rating, 5);

                    echo "<div class='text-center margin-top-10 col-sm-6 col-12 col-md-4'><div class='image-holder'><a href = '$link'><img alt='$name' class='img-fluid image-block' src='$image'></a></div><div class='font-15 text-block padding-10'> $name <br> Rating: $rating $stars</div></div>";
                }
            ?>
        </div>

     </div>    


<?php include_once("../includes/footer.php"); ?>