<form method="post" action="../utils/save_password.php">
    <table>
        <th colspan="2">Change Password</th>
        <tr>
            <td>
                <div class="labl">Old Password</div>
            </td>
            <td><input type="password" name="old_pass"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">New Password</div>
            </td>
            <td><input type="password" name="new_pass"></td>
        </tr>
        <tr>
            <td>
                <div class="labl">Confirm New Password</div>
            </td>
            <td><input type="password" name="conf_new_pass"></td>
        </tr>
        <th colspan="2" class="submit">
            <input type="submit" name="submit" class="btn" value="Submit" />
        </th>
    </table>
</form>