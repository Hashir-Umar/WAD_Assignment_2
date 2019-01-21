<?php
	//my root folder name
	$domain = "http://localhost/";
	$root_folder = "hostel.info/";
	$src_folder = $domain.$root_folder."src";

    //extracting root folder
    $page_reference = substr($_SERVER["SCRIPT_NAME"], 1);
    $page_reference = substr($page_reference, 0, strpos($page_reference, '/'));

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/".$page_reference."/pages/about-us.php":	
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
            break;
        case "/".$page_reference."/admin/admin-panel.php":
			$CURRENT_PAGE = "Admin Panel"; 
			$PAGE_TITLE = "Admin Panel";
            break;
        case "/".$page_reference."/pages/login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Login";
            break;
        case "/".$page_reference."/pages/signup.php":
			$CURRENT_PAGE = "Signup"; 
			$PAGE_TITLE = "Signup";
			break;
		case "/".$page_reference."/pages/forgot-password.php":
			$CURRENT_PAGE = "Forgot Password"; 
			$PAGE_TITLE = "Forgot Password";
			break;
		case "/".$page_reference."/pages/contact-us.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		case "/".$page_reference."/index.php":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "Home Page";
			break;
		case "/".$page_reference."/pages/add-hostel.php":
			$CURRENT_PAGE = "Add Hostel"; 
			$PAGE_TITLE = "Add Your Hostel";
			break;
		case "/".$page_reference."/pages/hostel-admin.php":
			$CURRENT_PAGE = "Admin Panel"; 
			$PAGE_TITLE = "Admin Panel";
			break;
		default:
			$CURRENT_PAGE = "Hostels Website";
			$PAGE_TITLE = "Hostels Website";
			break;
	}
	
?>