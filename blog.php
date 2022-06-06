<?php
require('./template/header.php');
?>
<script>
    tinymce.init({
        selector: '#blogbody',
        resize: false,
        plugins: 'autoresize',
        max_height: 500,
        min_height: 400,
        menubar: "edit format",
        setup: function(ed) {
            ed.on("keyup", function() {
                let blog = tinymce.activeEditor.getContent();
                if (blog == '') {
                    $('#btn_post').addClass('disabled');
                } else {
                    $('#btn_post').removeClass('disabled')
                }
            });
        },
    });
</script>

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
                <li class="nav-item ">
                    <a class="nav-link active" href="./blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./login.php">Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container px-3">
    <div class=" px-xl-3 py-3 my-3 text-center p-5 bg-light border rounded-3">

        <h2 class=" fw-bold border-bottom pb-3 mb-3">Welcome To The Blog</h2>


        <div class="col-lg-6 mx-auto ">
            <button type="button" class="btn btn-outline-dark w-75" data-bs-toggle="modal" data-bs-target="#blogModal">
                Create Post
            </button>
        </div>
    </div>
</div>

<!-- Blogssss -->
<nav id="navbar-example2" class="navbar justify-content-center navbar-light bg-light px-3">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading1">News Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2">Public Post</a>
        </li>

    </ul>
</nav>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    <h4 id="scrollspyHeading1" class="text-center fw-bold pt-2 pb-1 border-bottom">News Article</h4>
    <h6 class="text-center">Copyright &copy; 2021 The New York Times Company. All Rights Reserved.</h6>
    <div class="px-3 d-flex flex-wrap justify-content-center" id='news'>

    </div>
    <h4 id="scrollspyHeading2" class="text-center fw-bold pt-2 pb-1 border-bottom">Public Post</h4>
    <h6 class="text-center">Wait for an admin to approve your post.</h6>
    <div class=" px-3 d-flex flex-wrap justify-content-center" id='blogs'>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="blogModalLabel">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tinyform">
                    <label for="blogtitle" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="blogtitle" name="blogtitle" placeholder="Title" autocomplete="off" required>
                    <label for="blogbody" class="form-label">Body:</label>
                    <textarea id="blogbody" class="form-control" name="blogbody" placeholder="Type Here . . .">
                    </textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn_post" name="btn_post" class="btn btn-secondary disabled w-100">Post</button>
                </form>
            </div>
            <div id="lp-message"></div>
        </div>
    </div>
</div>


<?php
require('./template/footer.php')
?>

</html>