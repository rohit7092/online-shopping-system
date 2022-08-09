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
                <td><input type="text" name="Name" value="<?php echo $fetch_user->name;?>"></td>
            </tr>

            <tr>
                <td>Email : </td>
                <td><input type="email" name="Email" value="<?php echo $fetch_user->email;?>"></td>
            </tr>

            <tr>
                <td>Password : </td>
                <td><input type="password" name="Password" value="<?php echo $fetch_user->password?>"></td>
            </tr>

            <tr>
                <td>Bio : </td>
                <td><textarea name="bio"><?php echo $fetch_user->bio; ?></textarea></td>
            </tr>

            <tr>
                <td>Gender : </td>
                <td><input type="radio" name="Gender" value="male"
                <?php
                $g = $fetch_user->gender;
                if($g == "male")
                {
                    echo "checked='checked'";
                }
                ?>
                >Male
                    <input type="radio" name="Gender" value="female"
                    <?php
                    $g = $fetch_user->gender;
                    if($g == "female")
                    {
                        echo "checked='checked'";
                    }
                ?>
                    >Female
                    <input type="radio" name="Gender" value="other"
                    <?php
                    $g = $fetch_user->gender;
                    if($g == "other")
                    {
                        echo "checked='checked'";
                    }
                ?>
                    >Other</td>
            </tr>
            
            <tr>
                <td>Language : </td>
                <td><input type="checkbox" name="language[]" value="Gujarati"
                <?php
                $l = $fetch_user->language;
                $ll = explode(",",$l);
                if(in_array("Gujarati",$ll))
                {
                    echo "checked='checked'";
                }
                ?>
                >Gujarati
                    <input type="checkbox" name="language[]" value="Hindi"
                    <?php
                    $l = $fetch_user->language;
                    $ll = explode(",",$l);
                    if(in_array("Hindi",$ll))
                    {
                        echo "checked='checked'";
                    }
                    ?>
                    >Hindi
                    <input type="checkbox" name="language[]" value="English"
                    <?php  
                    $l = $fetch_user->language;
                    $ll = explode(",",$l);
                    if(in_array("English",$ll))
                    {
                        echo "checked='checked'";
                    }
                    ?>
                    >English</td>
            </tr>

            <tr>
                <br>
                <td>Country : </td>
                <td><select name="country">
                    <?php
                        foreach($country as $c) 
                        {

                            $cc = $fetch_user->country;
                            if($cc == $c-> cid)
                            {
                    ?>
                        <option value="<?php echo $c->cid; ?>" selected><?php echo $c->cname; ?></option>
                    <?php
                            }else
                            {
                    ?>
                        <option value="<?php echo $c->cid; ?>"><?php echo $c->cname; ?></option>
                    <?php
                            }
                        }
                    ?>
                    </select></td>
            </br>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    <br>
    </form>
</body>
</html>