<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.css'); ?>">

    <title>Home SIMPEG</title>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="guest">SIMPEG</a>
            <a class="btn btn-primary login-guest" href="<?= base_url('guest/login_page') ?>">Login</a>
        </div>
    </nav>

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="guest/detail_berita"><img class="d-block w-100 carousel-berita" src="<?= base_url('assets/img/kenaikan_jabatan.jpg') ?>" alt="First slide"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h2 class="mt-4">Related News</h2>
        <div class="row isi-berita-guest">
            <div class="col-4">
                <div class="card">
                    <a href="guest/detail_berita"><img class="card-img-top" src="<?= base_url('assets/img/kenaikan_jabatan.jpg') ?>" alt="Card image cap"></a>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <a href="guest/detail_berita"><img class="card-img-top" src="<?= base_url('assets/img/kenaikan_jabatan.jpg') ?>" alt="Card image cap"></a>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <a href="guest/detail_berita"><img class="card-img-top" src="<?= base_url('assets/img/kenaikan_jabatan.jpg') ?>" alt="Card image cap"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-dark text-light fixed-bottom">
        <div class="copyright text-center">
            <span>Copyright &copy; SIMPEG <?= date('Y') ?> || Designed By Muhammad Ilham Fhadilah</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/js/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>