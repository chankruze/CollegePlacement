<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
if (isset($_POST['submit'])) {
	$connection = mysqli_connect("localhost", "root", "", "placementdb");

	// start session
	session_start();
	$job_id = $_POST["job_id"];
	$shortlisted = $_POST["shortlisted"];

	foreach ($shortlisted as $app_no) {
		$query = "update job_applications set status=1 where job_id='$job_id'";
		$res = mysqli_query($connection, $query);
		$query = "update job_applications set qualified=1, status=1 where job_id='$job_id' and app_no='$app_no'";
		$res2 = mysqli_query($connection, $query);
	}

	if ($res and $res2) {
		//echo $qry;
		echo '<h1 class="query-status"><i class="far fa-check-circle"></i>' . count($shortlisted) . ' student(s) shortlisted</h1>';
		echo '<p class="redirecting">redirecting...</p>';
		header('refresh:3;url=../dashboard/admin.php');
	} else {
		//echo $qry;
		echo "<script>alert('could not save data');</script>";
		header('refresh:0;url=../dashboard/admin.php');
	}
}
