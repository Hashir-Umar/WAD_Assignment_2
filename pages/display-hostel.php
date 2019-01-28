<?php session_start(); ?>
<?php include("../config.php");?>

<?php
    $city;
    $id;
    $name;
    
    //search by city
    if (isset($_GET["city"]))
        $city = $_GET["city"];
    else
        $city = "";

    //search by id
    if (isset($_GET["id"]))
        $id = $_GET["id"];
    else
        $id = "";

    //search by name
    if (isset($_GET["name"]))
        $name = $_GET["name"];
    else
        $name = "";

    //search by name and city
    if (isset($_GET["name"]) && isset($_GET["name"])) {
        $name = $_GET["name"];
        $city = $_GET["city"];
    }
    else {
        $name = "";
        $city = "";
    }

    include_once("../server/database_connection.php");

    $sql = "SELECT * FROM hostels WHERE hostel_city='$city'";
    if($id != "")
        $sql = "SELECT * FROM hostels WHERE hostel_id='$id'";
    if($name != "")
        $sql = "SELECT * FROM hostels WHERE hostel_name='$name'";

    $result = mysqli_query($conn, $sql);
    $num_results = mysqli_num_rows($result);

    $PAGE_TITLE = $city;
?>

<?php include_once("../includes/header.php");
      include_once("../server/functions.php"); ?>
<body>

    <?php include_once("../includes/navbar.php"); ?>

    <div class="container">

        <br><br>

        <form method="GET" action="display-hostel.php">
            <div class="container">
            <div class="row">
                <div class="input-group mb-1 mb-md-2 col-12 col-sm-10">
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
                <button id="btn" type="submit" class="btn btn-block btn-outline-dark mb-1 mb-md-2 col-2 d-none d-sm-block"> Search </button>
            </div>
            </div>
        </form>
        
        <div id="hostel-container" class="row">
           
        </div>

     </div>    


<?php include_once("../includes/footer.php"); ?>
