<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php

$connection = mysqli_connect("localhost", "root", "", "placementdb");
// start session
session_start();
$uname = $_SESSION['username'];
$uid = $_SESSION['userid'];
$job_id = $_POST['job_id'];

// get stu_id from students using the uid & username
$query = "select * from students where uid='$uid' and uname='$uname';";

$res = mysqli_query($connection, $query);

if (!$res) {
	echo "<script>alert('Something Went Wrong');</script>";
	header('refresh:0;url=../dashboard/student.php');
}

if (mysqli_num_rows($res)) {
	$stu_id = mysqli_fetch_array($res)['stu_id'];

	// insert to job applications
	$query = "insert into job_applications (uid, stu_id, uname, job_id) values ('$uid', '$stu_id', '$uname', '$job_id')";

	if (mysqli_query($connection, $query) == true) {
		echo '<h1 class="query-status"><i class="far fa-check-circle"></i>Application Successful</h1>';
		echo '<p class="redirecting">redirecting...</p>';
		header('refresh:3;url=../dashboard/student.php');
	} else {
		echo "<script>alert('Couldn't save data');</script>";
		header('refresh:0;url=../dashboard/student.php');
	}
} else {
	echo "<script>alert('Add your details first');</script>";
	header('refresh:0;url=../dashboard/student.php');
}
