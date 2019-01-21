<?php include_once('../config.php'); ?>
<?php include_once('../includes/header.php'); ?>
<?php require_once("../server/database_connection.php"); ?>
<?php
    $city;
    if (isset($_GET["city"]))

        $city = $_GET["city"];
    else
        $city = "";

    $PAGE_TITLE = $city;
?>
<body style="overflow: hidden; background: #F9F9F9;">

    <nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $domain.$root_folder ?>"><span class="logo d-none d-md-inline">HOSTEL</span></a>
        <div class="float-left">
            <div class="d-flex align-items-center">
                <form class="form-inline py-2">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="hover-pointer mx-2"><i class="fa fa-bell"></i></div>
                <div class="hover-pointer mx-2">Hashir</div>
                <a href="logout.php" class="hover-pointer"><i class="fas fa-sign-out-alt mx-2"></i>Logout</a>
            </div>
        </div>
    </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Your Hostels</h1>
    </div>

    <section id="admin-tab">
        <div class="wrapper">
            <form class="form-inline mb-2" method="GET" action="hostel-admin.php">
                <div class="input-group col-10 p-0">
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
                <button id="btn" type="submit" class="btn btn-outline-dark col-2"> Search </button>
            </form>
            <div id="live-hostel" class="mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <h3>Live Hostels</h3>
                        <a class="btn btn-md btn-success" href="add-hostel.php"><i class="fas fa-plus mr-2"></i>Add New Hostel</a>
                    </li>

                    <?php

                        $sql = "select * from `hostels`";
                        if($city != "")
                            $sql = "select * from `hostels` WHERE hostel_city='$city'";
                        $result = mysqli_query($conn, $sql);
                        if(!$result) {
                            die("Error description: " . mysqli_error($conn));
                        } 
                        $count = mysqli_num_rows($result);
                        
                        while($count)
                        {
                            $row = mysqli_fetch_assoc($result);
                            echo '<li class="list-group-item">';
                                echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<div class="d-flex">';
                                        echo '<div class="image-wraper d-inline-block text-center mb-3">';
                                        echo '<img src="../'.$row['hostel_img'].'" height="100%" width="100%"/>';
                                            echo '<div> <strong>'.$row['hostel_name'].'</strong></div>';
                                        echo '</div>';
                                        echo '<div class="hostel-details ml-2">';
                                            echo '<strong>City: </strong> <span>'.$row['hostel_city'].'</span> <br/>';
                                            echo '<strong>Address: </strong> <span>'.$row['hostel_address'].'</span> <br/>';
                                            echo '<strong>Rooms Availible: </strong> <span>'.$row['hostel_rooms'].'</span> <br/>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="button-section d-flex flex-column">';
                                        echo '<button class="btn btn-md btn-warning"><i class="fa fa-edit"></i></button>';
                                        echo '<button class="btn btn-md btn-danger"><i class="fa fa-trash"></i></button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</li>';
                            $count--;
                        }
                    ?>

                    
                </ul>
            </div>
            <div id="pending-hostel">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h3>Pending Requests</h3>
                    </li>
                    <?php
                        $sql = "select * from `pending_hostels`";
                        $result = mysqli_query($conn, $sql);
                        if(!$result) {
                            die("Error description: " . mysqli_error($conn));
                        } 
                        $count = mysqli_num_rows($result);
                        
                        while($count)
                        {
                            $row = mysqli_fetch_assoc($result);
                            echo '<li class="list-group-item">';
                                echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<div class="d-flex">';
                                        echo '<div class="image-wraper d-inline-block text-center mb-3">';
                                        echo '<img src="../'.$row['hostel_img'].'" height="100%" width="100%"/>';
                                            echo '<div> <strong>'.$row['hostel_name'].'</strong></div>';
                                        echo '</div>';
                                        echo '<div class="hostel-details ml-2">';
                                            echo '<strong>City: </strong> <span>'.$row['hostel_city'].'</span> <br/>';
                                            echo '<strong>Address: </strong> <span>'.$row['hostel_address'].'</span> <br/>';
                                            echo '<strong>Rooms Availible: </strong> <span>'.$row['hostel_rooms'].'</span> <br/>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="button-section d-flex flex-column">';
                                        echo '<button class="btn btn-md btn-warning"><i class="fa fa-edit"></i></button>';
                                        echo '<button class="btn btn-md btn-danger"><i class="fa fa-trash"></i></button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</li>';
                            $count--;
                        }
                    ?>
                </ul>
            </div>
        </div>
    </section>

</body>
<?php include_once('../includes/footer.php'); ?>