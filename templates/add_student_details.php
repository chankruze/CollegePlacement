<?php
// start session
session_start();
$uname = $_SESSION['username'];
$uid = $_SESSION['userid'];

// db connection
$connection = mysqli_connect("localhost", "root", "", "placementdb");

/*
check if this user has already submitted the details
if so then load data and on submit update existing data
else submit new data
*/

$query = "select * from students where uid='$uid' and uname='$uname'";
$res = mysqli_query($connection, $query);

// current date
$date = date_create_from_format("Y-d-m", date("Y-d-m"));
// min dob (18+)
date_sub($date, date_interval_create_from_date_string('18 years'));
$date = (string)date_format($date, 'Y-m-d');

// select (stream)
$streams = [
    "Computer Science and Engineering",
    "Information Technology",
    "Civil Engineering",
    "Mechanical Engineering",
    "Electronics Engineering",
    "Electrical Engineering",
    "Applied Engineering",
    "Mining Engineering"
];

// select (qualification)
$qualifications = [
    "Diploma",
    "ITI",
    "Graduation",
    "Masters",
    "Post Graduation",
    "PhD"
];

// if student has filled details before
if (mysqli_num_rows($res)) {
    // select tuple
    $data = mysqli_fetch_array($res);

    // render update form
    echo '<form method="post" action="../utils/update_student_details.php">';
    echo '<table class="student_details">';
    echo '<th colspan="2">Update Your Details</th>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Roll No.*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_roll" value="' . $data['stu_roll'] . '" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Your Name*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_name" value="' . $data['stu_name'] . '" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Father\'s Name</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_fath_name" value="' . $data['stu_fath_name'] . '" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Date of Birth</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="date" name="stu_dob" value="' . $data['stu_dob'] . '" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Contact No.*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_mob" value="' . $data['stu_mob'] . '" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Email ID*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_mail" value="' . $data['stu_mail'] . '" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Stream</div>';
    echo '</td>';
    echo '<td>';

    echo '<select name="stu_stream">';
    foreach ($streams as $stream) {
        if ($stream == $data['stu_stream'])
            echo '<option value="' . $stream . '" selected>' . $stream . '</option>';
        else
            echo '<option value="' . $stream . '">' . $stream . '</option>';
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Qualification</div>';
    echo '</td>';
    echo '<td>';
    echo '<select name="stu_qualification" >';
    foreach ($qualifications as $qualification) {
        if ($qualification == $data['stu_qualification'])
            echo '<option value="' . $qualification . '" selected>' . $qualification . '</option>';
        else
            echo '<option value="' . $qualification . '">' . $qualification . '</option>';
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Marks (in %)*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="float" name="stu_marks" value="' . $data['stu_marks'] . '" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Area of Interest</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_interest" value="' . $data['stu_interest'] . '" />';
    echo '</td>';
    echo '</tr>';
    echo '<th colspan="2" class="submit">';
    echo '<input type="submit" name="submit" class="btn" value="Update Details" />';
    echo '</th>';
    echo '</table>';
    echo '</form>';
}
// if student has not filled details before
else {
    // render new form
    echo '<form method="post" action="../utils/save_new_student_details.php">';
    echo '<table class="student_details">';
    echo '<th colspan="2">Add Your Details</th>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Roll No.*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_roll" placeholder="F180010XXXXX" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Your Name*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_name" placeholder="Lynn Glover" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Father\'s Name</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_fath_name" placeholder="William Wright" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Date of Birth</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="date" name="stu_dob" value="' . $date . '" max="' . $date . '"/>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Contact No.*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_mob" placeholder="+91-XXXXX-XXXXX" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Email ID*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_mail" placeholder="tokij39689@vvaa1.com" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Stream</div>';
    echo '</td>';
    echo '<td>';

    echo '<select name="stu_stream">';
    foreach ($streams as $stream) {
        echo '<option value="' . $stream . '">' . $stream . '</option>';
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Qualification</div>';
    echo '</td>';
    echo '<td>';
    echo '<select name="stu_qualification" >';
    foreach ($qualifications as $qualification) {
        echo '<option value="' . $qualification . '">' . $qualification . '</option>';
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Marks (in %)*</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="float" name="stu_marks" placeholder="69.69" required />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<div class="labl">Area of Interest</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" autocomplete="off" name="stu_interest" placeholder="Gaming, Hacking, Art etc." />';
    echo '</td>';
    echo '</tr>';
    echo '<th colspan="2" class="submit">';
    echo '<span>* required</span>';
    echo '<input type="submit" name="submit" class="btn" value="Submit Details" />';
    echo '</th>';
    echo '</table>';
    echo '</form>';
}
