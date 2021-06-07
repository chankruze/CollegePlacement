<?php
if (isset($_POST['submit'])) {

	$connection = mysqli_connect("localhost", "root", "", "placementdb");

	if (
		!empty($_POST["JobName"]) and !empty($_POST["JobDesc"])
		and !empty($_POST["Company"]) and !empty($_POST["PostDate"])
		and !empty($_POST["Interdate"]) and !empty($_POST["strm"])
		and !empty($_POST["Qual"]) and !empty($_POST["salPack"])
		and !empty($_POST["Loc"])
	) {
		$job_title = $_POST['JobName'];
		$job_desc = $_POST["JobDesc"];
		$company = $_POST["Company"];
		$post_date = $_POST["PostDate"];
		$inter_date = $_POST["Interdate"];
		$last_date = $_POST["expDate"];
		$req_stream = $_POST["strm"];
		$qualification = $_POST["Qual"];
		$add_req = $_POST["oreq"];
		$sal_package = $_POST["salPack"];
		$location = $_POST["Loc"];

		// $query = "select max(job_id) as maxid from job_openings";

		// $run = mysqli_query($connection, $query);

		// while ($rows = mysqli_fetch_array($run)) {
		// 	$job_id  = $rows[0];
		// }

		// if (!$job_id) {
		// 	$t = microtime(true);
		// 	$job_id = sprintf("%04d", (($t - floor($t)) * 1000) + 1000);
		// } else {
		// 	$job_id  = $job_id + 1;
		// }

		$query = "insert into job_openings 
		(`job_title`, `job_desc`, `company`, `post_date`, `inter_date`, `last_date`, `qualification`, `req_stream`, `add_req`, `sal_package`, `location`) 
		values ('$job_title', '$job_desc', '$company', '$post_date', '$inter_date', '$last_date', '$qualification', '$req_stream', '$add_req', '$sal_package', '$location');";

		if (mysqli_query($connection, $query) == true) {
			// echo $query;
			echo "<script>alert('Data saved');</script>";
			header('refresh:0;url=../dashboard/admin.php');
		} else {
			// echo $query;
			echo "<script>alert('could not save data');</script>";
			header('refresh:0;url=../dashboard/admin.php');
		}
	} else {
		echo "<script>alert('fields cannot be left empty');</script>";
		header('refresh:0;url=../dashboard/admin.php');
	}
}
