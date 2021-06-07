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
                <li id="stuDetails">Add Your Details</li>
                <li id="ApplyJob">Apply for a Job</li>
                <li id="CheckRes">Check Interview Result</li>
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

        $("#stuDetails").click(function() {
            $("#render").empty();
            $("#render").load("../templates/add_student_details.php");
        });

        $("#ApplyJob").click(function() {
            $("#render").empty();
            $("#render").load("../templates/apply_job.php");
        });
        $("#CheckRes").click(function() {
            $("#render").empty();
            $("#render").load("../templates/check_result.php");
        });

        $("#ChangePwd").click(function() {
            $("#render").empty();
            $("#render").load("../templates/change_password.php");
        });
    });
</script>