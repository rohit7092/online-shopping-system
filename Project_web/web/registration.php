<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    
    <form action="" method="post">
        
        <table align="center" border="2">
            

            <tr>
                <td>Name : </td>
                <td><input type="text" name="Name"></td>
            </tr>

            <tr>
                <td>Email : </td>
                <td><input type="email" name="Email"></td>
            </tr>

            <tr>
                <td>Password : </td>
                <td><input type="password" name="Password"></td>
            </tr>

            <tr>
                <td>Bio : </td>
                <td><textarea name="bio"></textarea></td>
            </tr>

            <tr>
                <td>Gender : </td>
                <td><input type="radio" name="Gender" value="male">Male
                    <input type="radio" name="Gender" value="female">Female
                    <input type="radio" name="Gender" value="other">Other</td>
            </tr>
            
            <tr>
                <td>Language : </td>
                <td><input type="checkbox" name="language[]" value="Gujarati">Gujarati
                    <input type="checkbox" name="language[]" value="Hindi">Hindi
                    <input type="checkbox" name="language[]" value="English">English</td>
            </tr>

            <tr>
                <br>
                <td>Country : </td>
                <td><select name="country">
                    <?php
                        foreach($country as $c) 
                        {
                    ?>
                        <option value="<?php echo $c->cid; ?>"><?php echo $c->cname; ?></option>
                    <?php }
                    ?>
                    </select></td>
            </br>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="submit" value="SUBMIT">
                    <input type="reset" name="reset" value="RESET">
                </td>
            </tr>
        </table>
    <br>
    </form>
</body>
</html>