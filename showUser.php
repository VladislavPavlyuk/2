<?php

$arr = file ("user.txt");

$new_arr = str_replace(":","</td><td>", $arr);
$new_arr = str_replace("<br>","</tr><tr>", $new_arr);

foreach($new_arr as $i => $a)
    //echo '<tr><td> '.$a. ' </td></tr>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="showUser.php" method="post">
            <table border="1" align="center">
                <h2 align="center">Registered users</h2>
                <td align="center"> User </td><td align="center"> Password </td><td align="center"> e-mail </td>
                <?php
                foreach($new_arr as $i => $a)
                echo '<tr><td> '.$a. ' </td></tr>';
                ?>
            </table>
            <button align="center" type="button" class="btn btn-primary" onclick="history.back()">Back</button>
            <button type="button" class="btn btn-primary" onclick="location.href = 'index.php';">Home</button>
        </form>
    </div>
</div>
</body>
</html>