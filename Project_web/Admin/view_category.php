<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view category</title>
</head>
<body>
<form method="post">
        <table border="1" align="center">
            <tr>
                <td>Id</td>
                <td>Category</td>
                <td>Action</td>
            </tr>
            <?php
            foreach($data as $d)
            {
            ?>
            <tr>
                <td><?php echo $d->cat_id; ?></td>
                <td><?php echo $d->cat_name; ?></td>

                <td><a href="delete_category?did=<?php echo $d->cat_id;?>">Delete</a>|
                <a href="edit_category?eid=<?php echo $d->cat_id;?>">Edit</a>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>