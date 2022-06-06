<?php
require('connect.php');

$title = $_POST['blogtitle'];
$content = $_POST['blogbody'];
date_default_timezone_set('UTC');
$date = date("Y-m-d G:i:s", strtotime('+8 hours'));
$query = "INSERT INTO blog ( `title`, `content`, `created`,`approved`)VALUES('$title','$content','$date','1')";
if (mysqli_query($conn, $query)) {
} else {
    echo mysqli_error($conn);
}
