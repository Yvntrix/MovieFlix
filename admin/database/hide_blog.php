<?php
require('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE `blog` SET `approved` = '1' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
    }
    header("Location: ../blogs.php");
}
