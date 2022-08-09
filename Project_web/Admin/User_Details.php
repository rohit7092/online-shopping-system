<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Bio</td>
                <td>Gender</td>
                <td>Language</td>
                <td>Country</td>
                <td>Action</td>
            </tr>
            <?php
            foreach($data as $d)
            {
            ?>
            <tr>
                <td><?php echo $d->id; ?></td>
                <td><?php echo $d->name; ?></td>
                <td><?php echo $d->email; ?></td>
                <td><?php echo $d->bio; ?></td>
                <td><?php echo $d->gender; ?></td>
                <td><?php echo $d->language; ?></td>
                <td><?php echo $d->cname; ?></td>
                <td><a href="delete?did=<?php echo $d->id;?>">Delete</a>|
                <a href="edit?eid=<?php echo $d->id;?>">Edit</a>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>