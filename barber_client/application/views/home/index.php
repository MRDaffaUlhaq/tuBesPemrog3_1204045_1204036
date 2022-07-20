<nav class="navbar navbar-expand-md sticky-top navbar-light text-black shadow p-3 mb-5 bg-white rounded flex-column">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div><i class="fa fa-crown fa-2x"></i></div>
    <a class="h1 navbar-brand font-weight-bold" href="#">King's Barbershop</a>
    <!-- <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
        <ul class="navbar-nav">

            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('service'); ?>">Pelayanan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('job'); ?>">Jabatan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('customer'); ?>">Pelanggan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('employees'); ?>">Pegawai</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('transaction'); ?>">Transaksi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('cns'); ?>">Kritik & Saran</a>
            </li>
        </ul>
    </div> -->
</nav>
<div class="container-fluid d-flex justify-content-center">
    <!-- <div class="row">
        <div class="col-md-12 mx-auto">
            <div><i class="fa fa-crown fa-2x"></i></div>
        </div>

        <div class="col-md-12 mx-auto">
            <a class="h1 navbar-brand font-weight-bold" href="#">
                King's Barbershop
            </a>
        </div>
    </div> -->

    <div class="row p-5 mb-5">
        <div class="col-md-4 mx-auto">
            <div class="card p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('service'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fas fa-headset fa-4x"></i>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Pelayanan
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('job'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fas fa-user-tie fa-4x"></i>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Jabatan
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('customer'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fas fa-users fa-4x"></i>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Pelanggan
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-5 p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('employees'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fas fa-address-book fa-4x"></i>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Pegawai
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-5 p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('transaction'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fa fa-hand-holding-usd fa-4x"></i>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Transaksi
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mt-5 p-3 shadow bg-white rounded">
                <a class="nav-link" href="<?= base_url('cns'); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <i class="fas fa-archive fa-4x"></i>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="h6 text-center col d-flex justify-content-center">
                                Kritik & Saran
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>