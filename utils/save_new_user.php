<head>
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
if (isset($_POST['submit'])) {
	$connection = mysqli_connect("localhost", "root", "", "placementdb");

	session_start();

	if (
		!empty($_POST["usermail"]) and !empty($_POST["username"])
		and !empty($_POST["password"]) and !empty($_POST["usertype"])
	) {
		$umail = $_POST['usermail'];
		$uname = $_POST['username'];
		$upass = $_POST['password'];
		$utype = $_POST["usertype"];
		$loginurl = "http://" . $_SERVER['SERVER_NAME'] . "/placement/auth/$utype.php";

		$query = "insert into users (utype, umail, uname, upass) values ('$utype', '$umail', '$uname', '$upass');";

		if (mysqli_query($connection, $query) == true) {
			# send user credential in mail
			$to = $umail;
			$sub = "Placement Cell - Account Created 😎😍🥳";
			$msg = require('../templates/mail_account_creation.php');
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
			$headers .= "From: <no-reply@placement.cell>\r\n";
			if (mail($to, $sub, $msg, $headers)) {
				echo '<h1 class="query-status"><i class="far fa-check-circle"></i>User created</h1>';
				echo '<p class="redirecting">An email with credentials has been sent to the user</p>';
				echo '<p class="redirecting">redirecting...</p>';
				header('refresh:3;url=../dashboard/admin.php');
			}
		} else {
			echo "<script>alert('could not add user');</script>";
			header('refresh:0;url=../dashboard/admin.php');
		}
	}
}
