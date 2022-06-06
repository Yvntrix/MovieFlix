<?php
require('./template/header.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<script>
    function condel(id, name) {

        alertify.confirm('Approve', 'Approve this post by ' + name + ' ?', function() {
            window.location.href = './database/approve_blog.php?id=' + id
        }, function() {});
    }

    function conup(id, name) {

        alertify.confirm('Hide', 'Hide post by' + name + ' ?', function() {
            window.location.href = './database/hide_blog.php?id=' + id
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
                        <table class='table table-hover' id="blogTable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>content</th>
                                    <th>created</th>
                                    <th>approved</th>

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