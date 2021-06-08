<form method="post" action="../utils/save_job_application.php">
    <table class="apply_job">
        <th colspan="2"> Apply for a Job</th>
        <tr>
            <td>
                <div class="labl">Select A Job</div>
            </td>
            <td>
                <?php
                $con = mysqli_connect("localhost", "root", "", "placementdb");
                $qry = "select job_id, job_title from job_openings;";

                $run = mysqli_query($con, $qry);

                echo '<select name="job_id">';
                while ($rows = mysqli_fetch_array($run)) {
                    echo "<option value=" . $rows['job_id'] . ">" . $rows['job_title'] . "</option>";
                }
                ?>
            </td>
        </tr>
        <th colspan="2" class="submit"> <input type="submit" name="submit" class="btn" value="Submit" /> </th>
    </table>
</form>