<?php include("../config.php");?>
<?php include_once("../includes/header.php");
      include_once("../server/database_connection.php");
      include_once("../server/functions.php");?>
<?php session_start(); ?>
<body>

    <?php include("../includes/admin-panel-navbar.php");?>

    <div class="container-fluid padding-20">

        <div class="row">
            <div class="col-12 text-block font-28"> Admin Panel </div>
        </div>

        <div class = "row">
            <div class="col-12 text-block font-20"> Pending Hostel Requests </div>
            <table class="col-12 table table-striped">

                <?php
                    $sql = "SELECT * FROM pending_hostels;";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    echo "<tr>
                            <th> Name </th>
                            <th> Owner </th>
                          </tr>";
                    for ($var = 0; $var < $count; $var++)
                    {
                        $assoc = mysqli_fetch_assoc($result);
                        $owner = getHostelContactPending($conn, $assoc['hostel_id']);
                        $hostel_name = $assoc['hostel_name'];
                        echo "<tr>
                                <td> $hostel_name </td>
                                <td> $owner </td>
                              </tr>";
                    }
                ?>

            </table>

            <div class="col-12 text-block font-20"> Pending Hostel Owner Account Requests </div>
            <table class="col-12 table table-striped">

                <?php
                    $sql = "SELECT * FROM pending_users;";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    echo "<tr>
                            <th> Emails </th>
                          </tr>";
                    for ($var = 0; $var < $count; $var++)
                    {
                        $assoc = mysqli_fetch_assoc($result);
                        $user_email = $assoc['user_email'];
                        echo "<tr>
                                <td> $user_email </td>
                              </tr>";
                    }
                ?>

            </table>
        </div>

    </div>

     <footer>
        <div class='container text-center py-2 py-md-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>
    


<?php include_once("../includes/footer.php"); ?>