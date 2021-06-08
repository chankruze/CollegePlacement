<head>
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/utils.css">
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "placementDB");
$sql = "SELECT * from users where uname='" . $_POST["uname"] . "'";
$uname = $_POST["uname"];
$retval = mysqli_query($conn, $sql);

if ($retval) {
    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        // check if user access matches
        if ($row['utype'] == $_POST['utype']) {
            // check if password matches
            if ($row['upass'] == $_POST["pwd"]) {
                echo '<h1 class="query-status"><i class="far fa-check-circle"></i>login successful...</h1>';
                // start session
                session_start();
                echo '<p class="redirecting">saving data...</p>';
                // set session username 
                $_SESSION['username'] = $uname;
                // set session user id
                $_SESSION['userid'] = $row['uid'];
                // set session user type
                $_SESSION['usertype'] = $row['utype'];
                // redirect to respective dashboard
                echo '<p class="redirecting">redirecting...</p>';
                header('refresh:3;url=../dashboard/' . $_SESSION['usertype'] . '.php');
            } else {
                echo "<script>alert('either username or password is incorrect');</script>";
                header('refresh:0;url=./' . $_POST['utype'] . '.php');
            }
        } else {
            echo '<script>alert("\"' . $uname . '\" doesn\'t belongs to \"' . $_POST['utype'] . '\".\nclicking OK will redirect you to correct login page.");</script>';
            header('refresh:0;url=./' . $row['utype'] . '.php');
        }
    }
} else {
    echo "<script>alert('either username or password is incorrect');</script>";
    header('refresh:0;url=../index.php');
}

mysqli_close($conn);
?>