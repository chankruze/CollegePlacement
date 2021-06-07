<table class="job_app_status">
    <tr>
        <th>Job Title</th>
        <th>Company</th>
        <th>Interview Date</th>
        <th>Qualified</th>
        <th>Status</th>
    </tr>
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

    // $i = 1;
    while ($row = mysqli_fetch_array($res)) {
        // if ($i % 2 == 0) {
        //     echo "<tr bgcolor='#B7F7F2'><td>";
        // } else {
        //     echo "<tr bgcolor='#6BF5F1'><td>";
        // }
        // $i++;
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
        elseif ($row["qualified"] == 3) {
            if ($row["status"] == 1)
                echo 'Not Reviewed Yet';
            else
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

    ?>
</table>