<?php
require('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM booking WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php");
    }
}
