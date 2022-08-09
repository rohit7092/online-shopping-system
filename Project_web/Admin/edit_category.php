<form method="post">
    <table border="1" align="center">
        <tr>
            <td>Category:</td>
            <td><input type="text" name="category" value="<?php echo $fetch_c->cat_name; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="update" value="update"></td>
        </tr>
    </table>
</form>