<form method="post" enctype="multipart/form-data">
    <table border="1" align="center">
        <tr>
            <td>Category:</td>
            <td><select name="cat">
                <?php
                foreach($all_cat as $cat)
                {
                ?>
                <option value="<?php echo $cat->cat_id;?>>"><?php echo $cat->cat_name;?></option>
                <?php
                }
                ?>
                
            </select></td>
        </tr>
        <tr>
            <td>Product:</td>
            <td><input type="text" name="pro_name"></td>
        </tr>
        <tr>
            <td>pro_image</td>
            <td><input type="file" name="pro_image"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="number" name="pro_price"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Add_Product"></td>
        </tr>
    </table>
</form>