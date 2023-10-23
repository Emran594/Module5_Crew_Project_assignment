<?php
include 'functions.php';
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $userData = getUserDataFromDb($userId);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];

        updateUser($userId, $newUsername, $newEmail);

        header('Location: admin_dashboard.php');
        exit;
    }
} 
?>

<!DOCTYPE html>
<html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <h1>Edit User</h1>
                <form method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn" action="edit.php?userId=<?php echo $userId; ?>">
                    <div class="form-group">
                    <label for="username" class="sr-only" >Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $userData['username']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="email" class="sr-only" >Email:</label>
                    <input type="email" id="email" class="form-control" name="email" value="<?php echo $userData['email']; ?>">
                    </div>
                    <div class="form-group">
                    <input type="submit" value="Update User" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>
</html>
