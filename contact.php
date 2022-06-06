<?php
require('./template/header.php')
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Fifth navbar example">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><i class="fas fa-film"></i> MovieFlix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="./index.php" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./blog.php">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="./contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./about.php">About</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container d-flex justify-content-center align-items-center px-xl-3">
    <div class="container p-5-xl px-xl-5 py-5">
        <div class="row px-xl-5">
            <div class="col px-xl-5">
                <div class="card">
                    <div class="card-header bg-dark text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                        <form method="post" id="contact">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" name="message" rows="6" required></textarea>
                            </div>
                            <div class="d-flex mt-3 justify-content-center my-1">
                                <button type="submit" class="btn btn-dark text-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('./template/footer.php')
?>

</body>


</html>