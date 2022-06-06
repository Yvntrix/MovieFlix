<?php
require('./template/header.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<script>
    function condel(id, name) {

        alertify.confirm('Delete', 'Delete this Bookings from ' + name + ' ?', function() {
            window.location.href = './database/delete_book.php?id=' + id
        }, function() {});
    }
</script>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Movie Bookings</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <form class="form-inline ">

                        <input type="text" class="form-control w-25 mx-auto" name="search_text" id="search_text_book" placeholder="Search...">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive-xxl">
                        <table class='table table-hover' id="bookTable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Movie</th>
                                    <th>Location</th>
                                    <th>Theatre</th>
                                    <th>Seat</th>
                                    <th>Snacks</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php
    require('./template/footer.php')
    ?>