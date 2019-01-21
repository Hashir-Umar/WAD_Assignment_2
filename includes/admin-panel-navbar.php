<nav class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="wrapper">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <a href="<?php echo $domain.$root_folder ?>"><span class="logo d-none d-md-inline">HOSTEL</span></a>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link <?php if($CURRENT_PAGE == "Index") echo " active"; ?>" href="<?php echo $domain.$root_folder."index.php"; ?>"><i class="fa fa-plus"></i> &nbsp; Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $domain.$root_folder."pages/add-hostel.php"; ?>"> <i class="fas fa-database"></i> &nbsp; Database</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
