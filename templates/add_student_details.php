<?php
session_start();
$user_name = $_SESSION['username'];
$user_name = $_SESSION['userid'];
$connection = mysqli_connect("localhost", "root", "", "placementdb");
// $query = "select * from students where stu_uname=";

?>

<form method="post" action="../utils/save_student.php">
    <table class="student_details">
        <th colspan="2"> Add Your Details </th>
        <tr>
            <td>
                <div class="labl">Roll No.</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_roll"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Your Name</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_name"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Father's Name</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_fath_name"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Date of Birth</div>
            </td>
            <td><input type="date" name="stu_dob" value=<?php echo date('Y-m-d H:i:s'); ?>>
            </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Contact No.</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_mob"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Email ID</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_mail"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Branch</div>
            </td>
            <td> <select name="stu_stream">
                    <option value="Computer Science and Engineering" selected>Computer Science and Engineering</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Electronics Engineering">Electronics Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Applied Engineering">Applied Engineering</option>
                    <option value="Mining Engineering">Mining Engineering</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Course</div>
            </td>
            <td><select name="stu_qualification">
                    <option value="Graduation">Graduation</option>
                    <option value="Masters">Masters</option>
                    <option value="Post Graduate Diploma">Post Graduate Diploma</option>
                    <option value="Diploma">Diploma</option>
                    <option value="ITI">I.T.I</option>
                    <option value="PhD">PhD</option>
                    <option value="MPhil">MPhil</option>
                </select>
            </td>
        </tr>

        <td>
            <div class="labl">Marks (in %)</div>
        </td>
        <td><input type="float" name="stu_marks"> </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Area of Interest</div>
            </td>
            <td><input type="text" autocomplete="off" name="stu_interest"> </td>
        </tr>

        <th colspan="2" class="submit"><input type="submit" name="submit" class="btn" value="Submit" /></th>
    </table>
</form>