<form method="post" action="../utils/save_result.php">
    <table class="applicants_table">
        <th style="width: 10%;">User ID</th>
        <th style="width: 10%;">Student ID</th>
        <th style="width: 12%;">Application No.</th>
        <th>Full Name</th>
        <th style="width: 5%;">Shortlist</th>

        <?php
        $con = mysqli_connect("localhost", "root", "", "placementdb");

        if ($_POST['job_id']) {

            $job_id = $_POST['job_id'];

            $query = "select stu.uid, stu.stu_id, stu.uname, stu.stu_name, app.app_no 
            from 
            students stu, job_applications app 
            where 
            stu.uname=app.uname 
            and stu.uid=app.uid 
            and stu.stu_id=app.stu_id 
            and app.job_id='$job_id';";

            //echo $query;
            $res = mysqli_query($con, $query);

            // $i = 1;

            while ($row = mysqli_fetch_array($res)) {
                // if ($i % 2 == 0) {
                //     echo "<tr bgcolor='#ffccff'><td>";
                // } else {
                //     echo "<tr bgcolor='#ff99ff'><td>";
                // }
                // $i++;
                echo "<tr><td>";
                echo $row["uid"];
                echo "</td>";
                echo "<td>";
                echo $row["stu_id"];
                echo "</td>";
                echo "<td>";
                echo $row["app_no"];
                echo "</td>";
                echo "<td>";
                echo $row["stu_name"];
                echo "</td>";
                echo "<td>";
                $app_no = $row["app_no"];
                echo '<input type="checkbox" name="shortlisted[]" value="' . $app_no . '"';
                echo "</td>";
                echo "</tr>";
            }
        }
        echo '<input type="hidden" name="job_id" value="' . $job_id . '">';
        ?>
        <th class="submit" colspan="5">
            <input type="submit" name="submit" value="Save" class="btn" />
        </th>
    </table>
</form>