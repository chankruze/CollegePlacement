<html>

<head>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/jobs.css">
    <link rel="stylesheet" href="./assets/vendor/fontawesome/css/all.css">
</head>

<body>
    <div class="container">
        <div class="top-menu">
            <h1>College Placement System</h1>
            <div class="login-menu">
                <a href="./auth/student.php"><i class="fas fa-user-graduate"></i>Student</a>
                <a href="./auth/admin.php" class="admin"><i class="fas fa-user-shield"></i>Admin</a>
            </div>
        </div>


        <div class='jobs-container'>
            <?php
            $con = mysqli_connect("localhost", "root", "", "placementdb");
            $qry = "select * from job_openings where last_date > '" . date("Y-m-d") . "'";

            $res = mysqli_query($con, $qry);

            if (mysqli_num_rows($res)) {
                while ($rows = mysqli_fetch_array($res)) {
                    echo "<div class='job-card'>";
                    echo "<div class='header'>";
                    echo "<div class='post-id'>";
                    echo "<h2>" . $rows['job_id'] . "</h2>";
                    echo "</div>";
                    echo "<div class='post-title'>";
                    echo "<h1>" . $rows['job_title'] . "</h1>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='body'>";
                    echo "<div class='company'>";
                    echo "<h2><i class='fas fa-building'></i>" . $rows['company'] . "</h2>";
                    echo "<div class='location'>";
                    echo "<i class='fas fa-map-marker-alt'></i>";
                    echo "<h3>" . $rows['location'] . "</h3>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='qualification'>";
                    echo "<i class='fas fa-graduation-cap'></i>";
                    echo "<h2>" . $rows['qualification'] . " in " . $rows['req_stream'] . "</h2>";
                    echo "</div>";
                    echo "<div class='salary'>";
                    echo "<i class='fas fa-wallet'></i>";
                    echo "<h2>" . $rows['sal_package'] . "</h2>";
                    echo "</div>";
                    echo "<div class='description'>" . $rows['job_desc'] . "";

                    if ($rows['add_req']) {
                        echo "<p class='other-requirements'><span>Other Requirements:</span>" . $rows['add_req'] . "</p>";
                    } else {
                    }

                    echo "</div>";
                    // echo "<div class='interview-date'>";
                    // echo "<p><span>Interview on:</span>" . date("D, j F, Y", strtotime($rows['inter_date'])) . "</p>";
                    // echo "</div>";
                    echo "</div>";
                    echo "<div class='footer'>";
                    echo "<div>";
                    echo "<p class='post-date'><span>Posted on:</span>" . date("D, j F, Y", strtotime($rows['post_date'])) . "</p>";
                    echo "</div>";
                    echo "<div>";
                    echo "<p class='interview-date'><span>Interview on:</span>" . date("D, j F, Y", strtotime($rows['inter_date'])) . "</p>";
                    echo "</div>";
                    echo "<div>";
                    echo "<p class='last-date'><span>Last date:</span>" . date("D, j F, Y", strtotime($rows['last_date'])) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='no-job'>";
                echo "<img src='./assets/vectors/undraw_product_tour.svg' alt='No job openings;('/>";
                echo "<h1>No job openings😟</h1>";
                echo "</div>";
            }
            ?>
        </div>
        <script src="./assets/js/moment.min.js"></script>
</body>

</html>