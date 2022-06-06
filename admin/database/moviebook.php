<?php
require('connect.php');
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM `booking` 
	where fname like '%$search%'
	or lastname like '%$search%'
    or email like '%$search%'
	or location like '%$search%'
    or theatre like '%$search%'
    or seat like '%$search%'
    or snacks like '%$search%'
    or moviename like '%$search%'";
} else {
    $query = "SELECT * FROM booking order by id desc";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>"
            . "<td>" . $row['fname'] . "</td>"
            . "<td>" . $row['lastname'] . "</td>"
            . "<td>" . $row['email'] . "</td>"
            . "<td>" . $row['moviename'] . "</td>"
            . "<td>" . $row['location'] . "</td>"
            . "<td>" . $row['theatre'] . "</td>"
            . "<td>" . $row['seat'] . "</td>"
            . "<td>" . $row['snacks'] . "</td>"
            . "<td>" . $row['amount'] . "</td>"
            . "<td>"
            . "<a class='btn btn-danger' href='javascript:condel(\"" . $row['id'] . "\" , \"" . $row['email'] . "\");'><i class='fas fa-trash-alt'></a></td>"
            . "</td>"
            . "</tr>";
    }
} else {
    echo ' <tr> <td> </td> </td> <td>  <td> </td><td> <h5 ><i class="far fa-search"></i> No Info<h5>  </td>  <td> </td> <td> </td> <td> </td> <td> </td><td> </td></tr>';
}
