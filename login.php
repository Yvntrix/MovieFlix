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

<section class="d-flex justify-content-center align-items-center my-xl-5 mx-2">
    <div class="container col-xl-10 col-xxl-8 px-1 py-xl-5 my-xl-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" id="loginForm" method="post" action="./database/checkuser.php" autocomplete="off">
                    <h3 class="mb-3">Admin Login</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" />
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" />
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="btn_login_admin">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>s

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