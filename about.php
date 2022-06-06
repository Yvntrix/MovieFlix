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
                    <a class="nav-link " href="./index.php" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php"> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./about.php">About</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-sm my-5 py-5">
    <div class="d-flex justify-content-center my-5">
        <div class="card border-secondary mb-3" style="max-width: 50rem;">
            <div class="card-header">About Us</div>
            <div class="card-body ">
                <p class="card-text">MovieFlix is a website for booking movies created by BSIT 4-2 students Ivanne Rencel Bano, Jose Rafael Sarmiento and Arsel Edrada. We created this for people who can't go to actual cinema to book a seat for the movies they wanted to watch and also for easily booking movies.</p>
            </div>
        </div>
    </div>

</div>