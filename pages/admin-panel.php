<?php session_start(); ?>
<?php include("../config.php");?>
<?php include_once("../includes/header.php");
      include_once("../server/database_connection.php");
      include_once("../server/functions.php");?>
<body>

    <?php include("../includes/admin-panel-navbar.php");?>

    <div class="container-fluid padding-20">

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Request Rejection</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to reject this request?
              </div>
              <div class="modal-footer">
                <a href='#'><button type="button" class="btn action">Yes, Reject</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
         <!-- End Modal -->
        </div>

        <div class="row">
            <div class="col-12 text-block font-28"> Admin Panel </div>
        </div>

        <!-- Error/Success message -->

        <?php
            if(isset($_SESSION['admin_panel_msg']) && !empty($_SESSION['admin_panel_msg']))
            {
                $msg = $_SESSION['admin_panel_msg'];
                if(!preg_match('/[Ss]uccessfully/',  $msg))
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

                $_SESSION['admin_panel_msg'] = "";
            }
        ?>

        <!-- End error/success message -->

        <div class = "row">
            <div class="col-12 text-block font-20"> Pending Hostel Requests </div>
            <div class="table-responsive">
                <table class="col-12 table table-striped">

                    <?php
                        $sql = "SELECT * FROM pending_hostels;";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        echo "<thead><tr>
                                <th> Name </th>
                                <th> Address </th>
                                <th> City </th>
                                <th> Rooms </th>
                                <th> Extras </th>
                                <th> Owner </th>
                                <th> Options </th>
                              </tr></thead>";
                        for ($var = 0; $var < $count; $var++)
                        {
                            $assoc = mysqli_fetch_assoc($result);
                            $pendingID = $assoc['hostel_id'];
                            $owner = getHostelContactPending($conn, $pendingID);
                            $name = $assoc['hostel_name'];
                            $addr = $assoc['hostel_address'];
                            $city = $assoc['hostel_city']; 
                            $rooms = $assoc['hostel_rooms'];
                            $extras = $assoc['hostel_extras'];
                            echo "<tr>
                                    <td> $name </td>
                                    <td> $addr </td>
                                    <td> $city </td>
                                    <td> $rooms </td>
                                    <td> $extras </td>
                                    <td> $owner </td>
                                    <td>
                                    <button class='openDiag btn btn-danger btn-sm'
                                        data-toggle='modal'
                                        data-id='../server/admin-control.php?reject_hostel_req=$pendingID'
                                        data-btn-type='btn-danger'
                                        data-btn-text='Yes, Reject'
                                        data-body='Are you sure you want to reject this request?'
                                        data-title='Confirm Request Rejection'
                                        data-target='#myModal'>
                                            Reject
                                        </button> &nbsp;&nbsp;

                                    <button class='openDiag btn btn-success btn-sm'
                                        data-toggle='modal'
                                        data-id='../server/admin-control.php?accept_hostel_req=$pendingID'
                                        data-btn-type='btn-success'
                                        data-btn-text='Yes, Accept'
                                        data-body='Are you sure you want to accept this request?'
                                        data-title='Confirm Request Acception'
                                        data-target='#myModal'>
                                            Accept
                                        </button></td>
                                  </tr>";
                        }
                    ?>

                </table>
            </div>

            <div class="col-12 text-block font-20"> Pending Hostel Owner Account Requests </div>
            <table class="col-12 table table-striped">

                <?php
                    $sql = "SELECT * FROM pending_users;";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    echo "<thead><tr>
                            <th><center> Email </center></th>
                            <th><center> Options </center></th>
                          </tr></thead>";
                    for ($var = 0; $var < $count; $var++)
                    {
                        $assoc = mysqli_fetch_assoc($result);
                        $pendingID = $assoc['user_id'];
                        $user_email = $assoc['user_email'];
                        echo "<tr>
                                <td><center> $user_email </center></td>
                                <td><center>
                                    <button class='openDiag btn btn-danger btn-sm'
                                        data-toggle='modal'
                                        data-id='../server/admin-control.php?reject_user_req=$pendingID'
                                        data-btn-type='btn-danger'
                                        data-btn-text='Yes, Reject'
                                        data-body='Are you sure you want to reject this request?'
                                        data-title='Confirm Request Rejection'
                                        data-target='#myModal'>
                                            Reject
                                        </button> &nbsp;&nbsp;

                                    <button class='openDiag btn btn-success btn-sm'
                                        data-toggle='modal'
                                        data-id='../server/admin-control.php?accept_user_req=$pendingID'
                                        data-btn-type='btn-success'
                                        data-btn-text='Yes, Accept'
                                        data-body='Are you sure you want to accept this request?'
                                        data-title='Confirm Request Acception'
                                        data-target='#myModal'>
                                            Accept
                                        </button>
                                </center></td>
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