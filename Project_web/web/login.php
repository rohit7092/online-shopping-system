<?php
//user name
if(isset($_COOKIE['uname']))
{
    $u = $_COOKIE['uname'];
}
else
{
    $u = '';
}

//password
if(isset($_COOKIE['pass']))
{
    $p = $_COOKIE['pass'];
}
else
{
    $p = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <form method="post">
        <table border="1" align="center">
    <br>
        <tr>
                <td>Email : </td>
                <td><input type="email" name="Email" value="<?php echo $u; ?>"></td>
            </tr>

            <tr>
                <td>Password : </td>
                <td><input type="password" name="Password" value="<?php echo $p; ?>"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="checkbox" name="remember">Remember me</td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>

</br>

        </table>

    </form>
</body>
</html>