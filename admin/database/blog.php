<?php
require('connect.php');
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM blog
	where title like '%$search%'
	or content like '%$search%'
	or created like '%$search%'
    or approved like '%$search%'";
} else {
    $query = "SELECT * FROM blog order by id desc";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>"
            . "<td>" . $row['title'] . "</td>"
            . "<td>" . $row['content'] . "</td>"
            . "<td>" . $row['created'] . "</td>"
            . "<td>" . $row['approved'] . "</td>"
            . "<td>"
            . "<td class='d-flex justify-content-center'>
            <a class='btn btn-success'  href ='javascript:condel(\"" . $row['id'] . "\" , \"" . $row['title'] . "\");'>Approve</a> &nbsp &nbsp"
            . "<a class='btn btn-danger' href='javascript:conup(\"" . $row['id'] . "\" , \"" . $row['title'] . "\");'><i class='fas fa-trash-alt'></a></td>"
            . "</td>"
            . "</tr>";
    }
} else {
    echo ' <tr> <td> </td> </td> <td> <td> <h5 ><i class="far fa-search"></i> No Info<h5>  </td><td> </td></tr>';
}
