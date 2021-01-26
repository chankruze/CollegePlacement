<form method="get">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "placementDB");

    $sql = "SELECT password from users where username='" . $_POST["uname"] . "'";
    $un = $_POST["uname"];

    $retval = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        if ($row['password'] == $_POST["pwd"]) {
            echo "login successful<br> ";
            session_start();
            $_SESSION['username'] = $un;
            if ($_POST['usertype'] == "S")
                header('refresh:0;url=http://localhost:8088/placement/studash.php?uname=' . $un);
            else
                header('refresh:0;url=http://localhost:8088/placement/admdash.php?uname=' . $un);
        } else {
            echo "<script>alert('username or password incorrect');</script>";
            if ($_POST['usertype'] == "S")
                header('refresh:0;url=http://localhost:8088/placement/stulogin.php');
            else
                header('refresh:0;url=http://localhost:8088/placement/adminlogin.php');
        }
    }

    mysqli_close($conn);
    ?>
</form>