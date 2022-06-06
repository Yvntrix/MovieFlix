<?php
require('connect.php');
$query = "SELECT * FROM blog WHERE approved = 0 order by id desc";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="card  border-secondary m-3 h-50 blag ">
                  <h5 class="card-header bg-light border-secondary text-center">' . $row['title'] . '</h5>
                    <div class="card-body skroll">
                        <p class="card-text">' . $row['content'] . '</p>
                    </div>
                    <div class="card-footer text-end">
                    <small class=" badge bg-secondary">' . date('h:i A m/d/Y', strtotime($row['created'])) . '</small>
                  </div>
                </div>';
    }
} else {
    echo '<h1>No Post Available</h1>';
}
