<nav class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="wrapper">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <span class="logo d-none d-md-inline">HOSTEL</span>
        <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link <?php if($CURRENT_PAGE == "Index") echo " active"; ?>" href="<?php echo $domain.$root_folder."index.php"; ?>"><i class="fas fa-home"></i> &nbsp; Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain.$root_folder."pages/add-hostel.php"; ?>"> <i class="fa fa-plus"></i> &nbsp; Add Your Hostel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($CURRENT_PAGE == "About") echo " active"; ?>" href="<?php echo $domain.$root_folder."pages/about-us.php"; ?>"><i class="fa fa-user"></i> &nbsp; Meet Our Members</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($CURRENT_PAGE == "Contact") echo " active"; ?>" href="<?php echo $domain.$root_folder."pages/contact-us.php"; ?>" class="nav-link"> <i class="fas fa-envelope"></i> &nbsp; Contact Us</a>
        </li>
        </ul>
    </div>
    </div>
</nav>
