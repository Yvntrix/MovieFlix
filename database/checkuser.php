<?php
require('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == 'admin' && $password == 'admin') {
    $_SESSION['username'] = 'admin';
    header("Location: ../admin");
} else {
}
