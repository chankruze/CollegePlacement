<?php
if (isset($_POST['submit'])) {
	$connection = mysqli_connect("localhost", "root", "", "placementdb");

	// start session
	session_start();
	$job_id = $_POST["job_id"];
	$shortlisted = $_POST["shortlisted"];

	foreach ($shortlisted as $app_no) {
		$query = "update job_applications set qualified=1, status=1 where job_id='$job_id' and app_no='$app_no'";
		$res = mysqli_query($connection, $query);
	}

	if ($res == true) {
		//echo $qry;
		echo "<script>alert('Data saved');</script>";
		header('refresh:0;url=../dashboard/admin.php');
	} else {
		//echo $qry;
		echo "<script>alert('could not save data');</script>";
		header('refresh:0;url=../dashboard/admin.php');
	}
}
