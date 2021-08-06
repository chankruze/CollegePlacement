<form method="post" action="../utils/save_new_user.php">
    <table class="add_user">
        <th colspan="2"> Add New User</th>
        <tr>
            <td>
                <div class="labl">User Email*</div>
            </td>
            <td><input type="email" name="usermail" /></td>
        </tr>
        <tr>
            <td>
                <div class="labl">User Name*</div>
            </td>
            <td>
                <input type="text" name="username" required />
            </td>
        </tr>
        <tr>
            <td>
                <div class="labl">Password*</div>
            </td>
            <td>
                <input type="password" name="password" required />
            </td>
        </tr>
        <tr>
            <td>
                <div class="labl">User Type*</div>
            </td>
            <td>
                <select name="usertype">
                    <option value="student" selected>student</option>
                    <option value="admin">admin</option>
                </select>
            </td>
        </tr>
        <th colspan="2" class="submit">
            <input type="submit" name="submit" value="Save Details" class="btn" />
        </th>
    </table>
</form>