<!-- MENU -->

<!-- BACKGROUND -->
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://images.unsplash.com/photo-1519500528352-2d1460418d41?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fGJhcmJlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60">
    <span class="mask bg-gradient-dark opacity-6"></span>
</div>
<!-- END OF BACKGROUND -->

<!-- SIDEBAR -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs opacity-9 border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" type="button" href="#" data-container="body">
            <img src="<?= base_url('assets/img/logo.png'); ?> " class="navbar-brand-img" alt="main_logo">
            <span class="ms-1 h6 font-weight-bold">King's Barbershop</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">

                <a class="nav-link" href="<?= base_url('home'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('transaction'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-money-coins text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaksi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('customer'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pelanggan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('service'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-satisfied text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pelayanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('employees'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pegawai</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('job'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tag text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Jabatan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('cns'); ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kritik & Saran</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidenav mx-auto">
        <img class="w-50 pl-4 ml-5" src="<?= base_url('assets/img/illustrations/icon-documentation.svg'); ?>" alt="sidebar_illustration">
        <div class="card-body text-center w-100 pt-0">
            <div class="docs-info">
                <h6 class="mb-0">Sistem Informasi</h6>
                <p class="text-xs font-weight-bold mb-0">King's Barbershop</p>
            </div>
        </div>

    </div>

</aside>
<!-- END OF SIDEBAR -->

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li>
                                <button type="button" class="dropdown-item border-radius-md" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Logout
                                            </h6>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Yakin Logout?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Pastikan semua pekerjaan telah selesai
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <a href="<?= base_url('login/logout') ?>" class="btn bg-gradient-primary">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">