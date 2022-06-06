<?php
require('./template/header.php');
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><i class="fas fa-film"></i>MovieFlix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="./index.php" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./about.php">About</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="movie-info">
    <div class="moinfo container d-flex text-white  justify-content-evenly align-items-center" id="mov">
        . . .
    </div>
</div>
<div class="container-lg">
    <div class=" py-2 my-sm-3 rounded-3">
        <h3 class="card-title pt-sm-3 ps-4">Top Billed Cast</h3>
        <div class="d-flex flex-nowrap px-3 pre-scrollable" id="cast">
            . . . .
        </div>
    </div>
</div>
<div class="container-sm">
    <div class=" py-2 my-sm-3 rounded-3">
        <h3 class="card-title pt-sm-3 ps-4" id="upcoming">Similar Movies</h3>
        <div id="similar" class="d-flex flex-nowrap px-3 pre-scrollable">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bookBody">
                <form class="row g-3" id="bookForm">
                    <div class="col-md-6">
                        <label for="fname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="fname">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lname">
                    </div>
                    <div class="col-md-12 ">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-label">Location:</label>
                        <select class="form-select" name="location" id="location" required>
                            <option value="" selected disabled hidden>Choose here</option>
                            <option>SM Cabanatuan</option>
                            <option>Pacific Robinson</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="theatre" class="form-label">Theatre:</label>
                        <select class="form-select" name="theatre" id="theatre" required>
                            <option value="" selected disabled hidden>Choose here</option>
                            <option>2D</option>
                            <option>3D</option>

                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <label for="nums" class="form-label">Number of Seats:</label>
                        <input type="number" class="form-control" name="nums" min="1" oninput='this.value = Math.abs(this.value)'>
                    </div>
                    <div class="col-md-6">
                        <label for="snacks" class="form-label">Snacks</label>
                        <select class="form-select" name="snacks" id="snacks" required>
                            <option value="" selected disabled hidden>Choose here</option>
                            <option>Popcorn</option>
                            <option>Popcorn + Drinks</option>
                            <option>Chips</option>
                            <option>Chips + Drinks</option>
                            <option>Nachos</option>
                            <option>Nachos + Drinks</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" class="form-control" name="amount" min="1" oninput='this.value = Math.abs(this.value)'>
                    </div>
                    <div class="col-md-12 ">
                        <input type="hidden" class="form-control" name="moviename" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bnt_book">Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container vh-10">
    <footer class="py-2 my-2">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2021 MovieFlix, Inc</p>
    </footer>
</div>

<script src="./assets/book.js"></script>

</html>