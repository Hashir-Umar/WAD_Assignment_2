<?php
	//my root folder name
	$domain = "http://localhost/";
	$root_folder = "hostel.info/";
	$src_folder = $domain.$root_folder."src";

    //extracting root folder
    $page_reference = substr($_SERVER["SCRIPT_NAME"], 1);
    $page_reference = substr($page_reference, 0, strpos($page_reference, '/'));

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "$page_reference/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
            break;
        case "/$page_reference/admin/admin-panel.php":
			$CURRENT_PAGE = "Admin Panel"; 
			$PAGE_TITLE = "Admin Panel";
            break;
        case "/$page_reference/login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Login";
            break;
        case "/$page_reference/signup.php":
			$CURRENT_PAGE = "Signup"; 
			$PAGE_TITLE = "Signup";
			break;
		case "/$page_reference/contact-us.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		default:
			$CURRENT_PAGE = "Index";
            $PAGE_TITLE = "Home Page!";
        break;
    }
?>