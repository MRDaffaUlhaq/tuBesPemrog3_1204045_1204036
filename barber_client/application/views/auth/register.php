<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Sign Up
    </title>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0 mb-5">
        <div data-aos="zoom-in" ata-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://images.unsplash.com/photo-1634484144055-4f43f4a05a93?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDZ8fGJhcmJlcnNob3B8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60'); background-position: center;">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                            <p class="text-lead text-white">Silahkan lakukan registrasi akun di sistem informasi King's Barbershop.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                    <div class="col-xl-6 col-lg-5 col-md-7 mx-auto">
                        <div class="card shadow-lg p-3 bg-white rounded z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register</h5>
                            </div>
                            <!-- Message gagal -->
                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-danger alert-dismissible text-white fade-show" role="alert">
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Message gagal -->

                            <!-- Message sukses -->
                            <?php if ($this->session->flashdata('berhasil')) : ?>
                                <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('berhasil'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Message sukses -->

                            <div class="card-body">
                            <form action="<?= base_url('login/tryRegister') ?>" method="post">

                                <div class="mb-3">
                                    <input type="text" hidden name="user_id" class="form-control form-control-lg"  aria-label="user_id" >
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="email" required>
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                </div>
                                </form>
                                <p class="text-sm mt-3 mb-0">Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-dark font-weight-bolder">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script> Soft by Nawaf Naofal & Muhammad Rifqi Daffa Ulhaq.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>