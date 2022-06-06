<?php
require('./template/header.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<script>
    function condel(id, name) {

        alertify.confirm('Delete', 'Delete this email from ' + name + ' ?', function() {
            window.location.href = './database/delete_email.php?id=' + id
        }, function() {});
    }
</script>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Emails Received</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <form class="form-inline ">

                        <input type="text" class="form-control w-25 mx-auto" name="search_text" id="search_text" placeholder="Search...">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive-xxl">
                        <table class='table table-hover' id="emailTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Delivered</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

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