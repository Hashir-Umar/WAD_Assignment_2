<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="description" content="Find the Best Hostel for you to stay">
        <meta name="keywords" content="Hostels, hostel, university, hotel">
        <meta name="author" content="Wisaam Arif">
        <meta name="author" content="Hashir Umar">
        <meta name="author" content="Sufyan Ashraf">
        <meta name="author" content="Noman Afzal">
        <meta name="author" content="Rana Umair">
        <title>Login</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../src/css/bootstrap.css">
        <link rel="stylesheet" href="../src/css/styles.css">
        <link rel="stylesheet" href="../src/css/logandsign.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="shortcut icon" href="../src/images/icon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins" rel="stylesheet">
        
</head>
<body>

    <nav class="navbar navbar-expand-md py-2 py-md-4">
        <div class="wrapper">
            <span class="logo ml-5">HOSTEL</span>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center my-4"> Sign<span>up </span></h1>
         <form action="#">
            <div class="row">
                <div class="col-sm-12 offset-md-3 col-md-6 col-lg-6">
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></i></div>
                        </div>
                        <input class="form-control" type="text" name="first_name" placeholder="first name" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></i></div>
                        </div>
                        <input class="form-control" type="text" name="last_name" placeholder="last name" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></i></div>
                        </div>
                            <input class="form-control" type="text" name="birthday" placeholder="11/18/1999" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-mars"></i></div>
                        </div>
                        <select class="form-control" id="Gender" name="Gender" required>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input class="form-control" type="text" name="email" placeholder ="Enter your Email" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                        </div>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-1 mb-md-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                        </div>
                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                    <button id=btn type="submit" class="btn btn-block btn-outline-dark mb-1 mb-md-2"> Register </button>
                    <div class="lables">
                        <p> <a href="login.html"> <i class="fas fa-sign-in-alt"></i> Already Have An Account?</a></p>
                    </div>
                    <a href="../index.html"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to Home</a>
                </div>
            </div> 
         </form>
     </div>

     <footer>
        <div class='container text-center py-2 py-md-4'>
            All Rights Reserved. <a href='#' class="text-muted"> hostel.info </a>  &copy; 2018
        </div>
    </footer>
    

</body>
</html>