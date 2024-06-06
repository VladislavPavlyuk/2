<?php
$message = '';

if (!empty($_POST)) {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]))
    {
        $fileString=file_get_contents("user.txt");
        $pos=strstr($fileString, $_POST["username"]);
        if ($pos===false) {
            $userdata = $_POST["username"].": ".$_POST["password"].": ".$_POST["email"]."\r\n";
            $file=fopen("user.txt", "a");
            fwrite($file, $userdata);
            fclose($file);
            header("Location: index.php");
        }
        else {
            $message = 'User with such username already exists';
        }
    }
    else {
        $message = 'Please fill all fields';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?= $message ?>
    <div class="row">
        <form action="addUser.php" method="post">
            <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="Username" placeholder="username" name="username">
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="done">Submit</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>