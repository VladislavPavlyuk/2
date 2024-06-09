<?php
$redMessage = '';
$greenMessage = '';

if (!empty($_POST)) {
    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $login = htmlentities($_REQUEST['username']);
        $password = htmlentities($_REQUEST['password']);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $fileString=file_get_contents("user.txt");
        $pos_username=strstr($fileString, $login);
        $pos_password=strstr($fileString, $hashedPassword);
        if ($pos_username && $hashedPassword) {
            $greenMessage = $login.' has logged successfully!';
            //header("Location: index.php");
        }
        else {
            $redMessage = 'Access denied';
        }
    }
    else {
        $redMessage = 'Please fill all fields';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div style="color: red"><?= $redMessage ?></div>
    <div style="color: green"><?= $greenMessage ?></div>

    <div class="row">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Username" placeholder="username" name="username">
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="done">Submit</button>
            <button type="button" class="btn btn-primary" onclick="history.back()">Back</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>