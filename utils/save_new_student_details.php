<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
if (isset($_POST['submit'])) {

	session_start();
	$uname = $_SESSION['username'];
	$uid = $_SESSION['userid'];

	$connection = mysqli_connect("localhost", "root", "", "placementdb");

	if (!empty($_POST["stu_roll"]) and !empty($_POST["stu_name"])) {
		$stu_roll = $_POST["stu_roll"];
		$stu_name = $_POST["stu_name"];
		$stu_fath_name = $_POST["stu_fath_name"];
		$stu_dob = $_POST["stu_dob"];
		$stu_mob = $_POST["stu_mob"];
		$stu_mail = $_POST["stu_mail"];
		$stu_qualification = $_POST["stu_qualification"];
		$stu_stream = $_POST["stu_stream"];
		$stu_marks = (float)$_POST["stu_marks"];
		$stu_interest = $_POST["stu_interest"];

		$query = "insert into students 
		(`uid`, `stu_roll`, `uname`, `stu_name`, `stu_fath_name`, `stu_dob`, `stu_mob`, `stu_mail`, `stu_qualification`, `stu_stream`, `stu_marks`, `stu_interest`) 
		values 
		('$uid', '$stu_roll', '$uname', '$stu_name', '$stu_fath_name', '$stu_dob', '$stu_mob', '$stu_mail', '$stu_qualification', '$stu_stream', '$stu_marks', '$stu_interest');";

		if (mysqli_query($connection, $query) == true) {
			echo '<h1 class="query-status"><i class="far fa-check-circle"></i>Data Saved</h1>';
			echo '<p class="redirecting">redirecting...</p>';
			// echo "<script>alert('Data saved');</script>";
			header('refresh:3;url=../dashboard/student.php');
		} else {
			echo "<script>alert('could not save data');</script>";
			header('refresh:0;url=../dashboard/student.php');
		}
	} else {
		echo "<script>alert('ROLL NO. or NAME can't be empty');</script>";
		header('refresh:0;url=../dashboard/student.php');
	}
}
