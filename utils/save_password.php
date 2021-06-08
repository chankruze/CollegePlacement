<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
$connection = mysqli_connect("localhost", "root", "", "placementdb");

session_start();
$user_name = $_SESSION['username'];
$user_type = $_SESSION['usertype'];
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$confirm_new_pass = $_POST['conf_new_pass'];

if ($new_pass != $confirm_new_pass) {
	echo "<script>alert('password do not match');</script>";
	header('refresh:0;url=../dashboard/' . $user_type . '.php');
} else {
	$query = "update users set upass='$new_pass' where utype='$user_type' and uname='$user_name' and upass='$old_pass'";

	if (mysqli_query($connection, $query) == true) {
		echo '<h1 class="query-status"><i class="far fa-check-circle"></i>Password changed</h1>';
		echo '<p class="redirecting">redirecting...</p>';
		header('refresh:3;url=../dashboard/' . $user_type . '.php');
	} else {
		echo $qry;
		echo "<script>alert('could not update password');</script>";
		header('refresh:0;url=../dashboard/' . $user_type . '.php');
	}
}
