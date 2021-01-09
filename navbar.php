<div class="container-fluid px-md-5  pt-4 pt-md-5">
    <div class="row justify-content-between">
        <div class="col-md-8 order-md-last">
            <div class="row">
                <div class="col-md-6 text-center">
                    <a class="navbar-brand" href="index.php">Digital <span>Library</span>
                        <small>Man 2Mojokerto</small>
                    </a>
                </div>
                <div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
                    <?php if(isset($_SESSION['user'])) { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="admin/logout.php" class="nav-link">Logout</a></li>
                    </ul>
                    <?php } else { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="social-media">
                <p class="mb-0 d-flex">
                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                            class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                            class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                            class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                            class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                </p>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item <?= $filename == "index.php" ? 'active' : ''; ?>"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item <?= $filename == "book.php" ? 'active' : ''; ?>"><a href="book.php" class="nav-link">Books</a></li>
                <li class="nav-item <?= $filename == "event.php" ? 'active' : ''; ?>"><a href="event.php" class="nav-link">Event</a></li>
                <li class="nav-item <?= $filename == "lomba.php" ? 'active' : ''; ?>"><a href="lomba.php" class="nav-link">Lomba</a></li>
                <li class="nav-item <?= $filename == "usulan.php" ? 'active' : ''; ?>"><a href="usulan.php" class="nav-link">Usulan</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->