<?php
require('connect.php');
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM email
	where name like '%$search%'
	or email like '%$search%'
	or content like '%$search%'";
} else {
    $query = "SELECT * FROM email order by id desc";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>"
            . "<td>" . $row['name'] . "</td>"
            . "<td>" . $row['email'] . "</td>"
            . "<td>" . $row['content'] . "</td>"
            . "<td>" .   date('h:i A m/d/Y', strtotime($row['sent'])) . "</td>"
            . "<td>"
            . "<a class='btn btn-danger' href='javascript:condel(\"" . $row['id'] . "\" , \"" . $row['email'] . "\");'><i class='fas fa-trash-alt'></a></td>"
            . "</td>"
            . "</tr>";
    }
} else {
    echo ' <tr> <td> </td> </td> <td> <td> <h5 ><i class="far fa-search"></i> No Info<h5>  </td><td> </td></tr>';
}
