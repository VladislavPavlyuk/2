<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Users</title>
</head>
<body>
<?php

$arr = file ("user.txt");

$new_arr = str_replace(":","</td><td>", $arr);
$new_arr = str_replace("<br>","</tr><tr>", $new_arr);

echo '<table border="1">';
echo '<td align="center"> User </td><td align="center"> Password </td><td align="center"> e-mail </td>';

foreach($new_arr as $i => $a)
echo '<tr><td> '.$a. ' </td></tr>';



// делаем замену

?>
</body>
</html>