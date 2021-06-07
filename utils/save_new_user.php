<?php
$connection = mysqli_connect("localhost", "root", "", "placementdb");

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST["usertype"];

$query = "insert into users (utype, uname, upass) values ('$usertype', '$username', '$password');";

if (mysqli_query($connection, $query) == true) {
	echo "<script>alert('New User Created');</script>";
	header('refresh:0;url=../dashboard/admin.php');
} else {
	echo "<script>alert('could not update password');</script>";
	header('refresh:0;url=../dashboard/admin.php');
}
