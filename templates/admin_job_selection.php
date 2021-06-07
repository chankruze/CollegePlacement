<div id="job-selection-wrapper">
    <h3>Select A Job</h3>
    <?php
    $con = mysqli_connect("localhost", "root", "", "placementdb");
    $qry = "select job_id, job_title from job_openings;";
    $run = mysqli_query($con, $qry);
    echo "<select name='job_id' id='job_id'>";
    while ($rows = mysqli_fetch_array($run)) {
        echo "<option value=" . $rows['job_id'] . ">" . $rows['job_title'] . "</option>";
    }
    echo "<option val='none' selected>None</option>";
    echo "</select>";
    ?>
</div>

<div id="applicants-wrapper"></div>

<script>
    $(document).ready(function() {
        $("#job_id").change(function() {
            $("#applicants-wrapper").empty()
            $("#applicants-wrapper").load("../templates/show_applicants.php", {
                'job_id': $(this).val()
            });
        });
    });
</script>