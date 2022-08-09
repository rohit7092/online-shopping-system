<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view product</title>
</head>
<body>
<form method="post">
        <table border="1" align="center">
            <tr>
                <td>Pro_id</td>
                <td>Cat_id</td>
                <td>Pro_name</td>
                <td>Pro_image</td>
                <td>Pro_price</td>
                <td>Action</td>
            </tr>
            <?php
            foreach($data as $d)
            {
            ?>
            <tr>
                <td><?php echo $d->pro_id; ?></td>
                <td><?php echo $d->cat_id; ?></td>
                <td><?php echo $d->pro_name; ?></td>
                <td><?php echo $d->pro_image; ?></td>
                <td><?php echo $d->pro_price; ?></td>
                
                <td><a href="delete_product?did=<?php echo $d->pro_id;?>">Delete</a>|
                <a href="edit_product?eid=<?php echo $d->pro_id;?>">Edit</a>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>