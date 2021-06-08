<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
$connection = mysqli_connect("localhost", "root", "", "placementdb");

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST["usertype"];

$query = "insert into users (utype, uname, upass) values ('$usertype', '$username', '$password');";

if (mysqli_query($connection, $query) == true) {
	echo '<h1 class="query-status"><i class="far fa-check-circle"></i>User created</h1>';
	echo '<p class="redirecting">redirecting...</p>';
	header('refresh:3;url=../dashboard/admin.php');
} else {
	echo "<script>alert('could not update password');</script>";
	header('refresh:0;url=../dashboard/admin.php');
}
