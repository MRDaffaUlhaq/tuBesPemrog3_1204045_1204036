<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png'); ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png'); ?>">
    <title>
        Sign In
    </title>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.0.4'); ?>" rel="stylesheet" />
</head>

<body style="background-color: #ffff;">

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                    <div class="row">
                        <div data-aos="fade-left" ata-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div mb-2>
                                    <!-- Menampilkan flash data (pesan saat data error)-->
                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <div class="alert alert-danger text-white alert-dismissible fade show" role="alert">
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('berhasil')) : ?>
                                        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                                            <?= $this->session->flashdata('berhasil'); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="card shadow-lg p-3 bg-white rounded">
                                    <div class="card-header pb-0 text-start">
                                        <h4 class="font-weight-bolder">Sign In</h4>
                                        <p class="mb-0">Silahkan masukkan username dan password</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('login/login') ?>" method="post">

                                            <div class="mb-3">
                                                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-secondary btn-lg btn-lg w-100 mt-4 mb-0">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Belum punya akun?
                                            <a href="<?= base_url('register') ?>" class="text-dark font-weight-bolder">Sign up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-secondary h-100 px-7 d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1598524374912-6b0b0bab43dd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8YmFyYmVyc2hvcHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60'); background-size: cover;">
                                <span class="mask bg-gradient-secondary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Selamat Datang"</h4>
                                <p class="text-white position-relative">Ke mana fokus anda pergi, maka kesana lah energi anda akan mengalir.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4'); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>