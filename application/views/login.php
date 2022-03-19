<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=base_url('template/bootstrap.min.css') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
<center>
    <h1>Login</h1>
    <table>
        <form action="<?=base_url('Home/proses_login') ?>" method="post">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td> <input type="text" name="username" id=""> </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="number" name="password" id=""> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Login" class="btn btn-primary"> </td>
                <td></td>
                <td></td>
            </tr>
        </form>
    </table>
    </center>
</body>
</html>