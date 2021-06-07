<?php
if (isset($_POST['submit'])) {
	echo 'submitted...';
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

		session_start();
		$uname = $_SESSION['username'];
		$uid = $_SESSION['userid'];

		$query = "insert into students
(`uid`, `stu_roll`, `uname`, `stu_name`, `stu_fath_name`, `stu_dob`, `stu_mob`, `stu_mail`, `stu_qualification`, `stu_stream`, `stu_marks`, `stu_interest`) 
values ('$uid', '$uname', '$stu_uname', '$stu_name', '$stu_fath_name', '$stu_dob', '$stu_mob', '$stu_mail', '$stu_qualification', '$stu_stream', '$stu_marks', '$stu_interest')";

		if (mysqli_query($connection, $query) == true) {
			echo "<script>alert('Data saved');</script>";
			header('refresh:0;url=../dashboard/student.php');
		} else {
			echo "<script>alert('could not save data');</script>";
			header('refresh:0;url=../dashboard/student.php');
		}
	} else {
		echo "<script>alert('fields cannot be left empty');</script>";
		header('refresh:0;url=../dashboard/student.php');
	}
}
