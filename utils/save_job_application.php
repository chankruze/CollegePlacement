<?php

$connection = mysqli_connect("localhost", "root", "", "placementdb");

session_start();

$uname = $_SESSION['username'];
$uid = $_SESSION['userid'];
$job_id = $_POST['job_id'];

# get stu_id from students using the uid & username
$query = "select * from students where uid='$uid' and uname='$uname';";

$res = mysqli_query($connection, $query);

if (!$res) {
	echo "<script>alert('Something Went Wrong');</script>";
	header('refresh:0;url=../dashboard/student.php');
}

if (!mysqli_num_rows($res)) {
	echo "<script>alert('Invalid Student Data (Add your details first)');</script>";
	header('refresh:0;url=../dashboard/student.php');
}

$stu_id = mysqli_fetch_array($res)['stu_id'];

# insert to job applications
$query = "insert into job_applications (uid, stu_id, uname, job_id) values ('$uid', '$stu_id', '$uname', '$job_id')";

if (mysqli_query($connection, $query) == true) {
	echo "<script>alert('Data saved');</script>";
	header('refresh:0;url=../dashboard/student.php');
} else {
	echo "<script>alert('Couldn't save data');</script>";
	header('refresh:0;url=../dashboard/student.php');
}
