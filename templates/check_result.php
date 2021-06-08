<?php
$connection = mysqli_connect("localhost", "root", "", "placementdb");

# get session info
session_start();
$uname = $_SESSION['username'];
$uid = $_SESSION['userid'];

# find job applied for
$query = "select job.job_title, job.company, job.inter_date, app.qualified, app.status 
    from 
    job_openings job, job_applications app 
    where 
    app.uid='$uid' 
    and app.uname='$uname' 
    and app.job_id=job.job_id";

// echo $query;
# exec query
$res = mysqli_query($connection, $query);

// student has already applied for jobs
if (mysqli_num_rows($res)) {

    echo "<table class='job_app_status'>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Company</th>";
    echo "<th>Interview Date</th>";
    echo "<th>Qualified</th>";
    echo "<th>Status</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($res)) {
        echo "<td>";
        echo $row["job_title"];
        echo "</td>";
        echo "<td>";
        echo $row["company"];
        echo "</td>";
        echo "<td>";
        echo  date("D, j F, Y", strtotime($row['inter_date']));
        echo "</td>";
        echo "<td>";
        if ($row["qualified"] == 1)
            echo 'Yes';
        elseif ($row["qualified"] == 3 and $row["status"] == 1) {
            echo 'TBD';
        } else
            echo 'No';
        echo "</td>";
        echo "<td>";
        if ($row["status"] == 1)
            echo 'Reviewed';
        else
            echo 'Pending';
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<div class='no-result'>";
    echo "<img src='../assets/vectors/undraw_no_data.svg' alt='No Applications;('/>";
    echo "<h1>You've not applied for any job😟</h1>";
    echo "</div>";
}
?>
</table>