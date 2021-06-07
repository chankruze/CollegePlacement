<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
</head>

<div class="container">
    <div class="top-menu">
        <h1>College Placement System</h1>
        <h3 class="username">
            <?php session_start();
            $uname = $_SESSION["username"];
            echo $uname;
            ?>
        </h3>
        <div class="logout">
            <a href="../auth/logout.php">
                <i class="fas fa-sign-out-alt"></i>
                logout
            </a>
        </div>
    </div>
    <div class="content">
        <div class="left-menu">
            <ul>
                <li id="newJob">Add new job</li>
                <li id="newUser">Add new user</li>
                <li id="UpdateRes">Shortlist Students</li>
                <li id="ChangePwd">Change password</li>
            </ul>
        </div>
        <div class="right-menu" id="render">
        </div>
    </div>
</div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#newJob").click(function() {
            $("#render").load("../templates/add_job.php");
        });
        $("#newUser").click(function() {
            $("#render").load("../templates/add_user.php");
        });
        $("#UpdateRes").click(function() {
            $("#render").load("../templates/admin_job_selection.php");
        });
        $("#ChangePwd").click(function() {
            $("#render").load("../templates/change_password.php");
        });
    });
</script>