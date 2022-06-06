<?php
require('./template/header.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Fifth navbar example">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><i class="fas fa-film"></i>MovieFlix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="./index.php" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="./about.php">About</a>

            </ul>
        </div>
    </div>
</nav>

<div class="container-sm bg-light pb-3">
    <div class="text-center ">
        <h2 class=" fw-bold ">Welcome.</h2>
        <p class="lead">
            Book a ticket with just a few clicks. Many movies to choose from, Always updated with the upcoming movies.
        </p>
    </div>
    <div class="p-2 ">
        <form id="form" autocomplete="off" class="my-sm-3">
            <input type="text" placeholder="Search . . ." id="search" class=" form-control w-75 mx-auto" autocomplete="off">
        </form>
    </div>
</div>
<div class="container-sm">
    <div class=" py-2 my-sm-3 rounded-3">
        <h3 class="card-title pt-sm-3 ps-4" id="what"> What's Popular?</h3>
        <div id="main" class="d-flex flex-nowrap px-3 pre-scrollable">
        </div>
    </div>
</div>

<div class="container-sm">
    <div class=" py-2 my-sm-3 rounded-3">
        <h3 class="card-title pt-sm-3 ps-4" id="upcoming"> Upcoming</h3>
        <div id="up-main" class="d-flex flex-nowrap px-3 pre-scrollable">
        </div>
    </div>
</div>

<div class="modal fade" id="myNav" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myNavLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center fw-bold" id="myNavLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  d-flex justify-content-center align-items-center flex-column " id="overlay-content">
                ...
            </div>
            <div class="modal-footer" id="foot">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="location.href='./booking.php'">Book</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <footer class="py-2 my-2">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2021 MovieFlix, Inc</p>
    </footer>
</div>
</body>
<script src="./assets/home.js"></script>

</html>