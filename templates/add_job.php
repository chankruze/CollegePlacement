<form method="post" action="../utils/save_new_job.php">
    <table class="add_job">
        <th colspan="2">Add a New Job for Placement</th>
        <tr>
            <td>
                <div class="labl">Job Title*</div>
            </td>
            <td><input type="text" name="JobName" placeholder="Junior Developer etc."></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Job Description</div>
            </td>
            <td><textarea name="JobDesc"></textarea></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Company Name*</div>
            </td>
            <td><input type="text" name="Company" placeholder="Sticker Mule etc."></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Post Date*</div>
            </td>
            <td><input type="date" name="PostDate" value=<?php echo date('d-m-y'); ?>> </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Job Expiry Date*</div>
            </td>
            <td><input type="date" name="expDate" value=<?php echo date('d-m-y'); ?>> </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Interview Date*</div>
            </td>
            <td><input type="date" name="Interdate"> </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Stream*</div>
            </td>
            <td> <select name="strm">
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
                <div class="labl">Qualification*</div>
            </td>
            <td><select name="Qual">
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
        <tr>
            <td>
                <div class="labl">Other Requirements</div>
            </td>
            <td><input type="text" name="oreq"> </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Salary Package*</div>
            </td>
            <td><input type="text" name="salPack" width="300px"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Location*</div>
            </td>
            <td><input type="text" name="Loc"> </td>
        </tr>
        <th colspan="2" class="submit">
            <input type="submit" name="submit" value="Save Job" class="btn" />
        </th>
    </table>
</form>