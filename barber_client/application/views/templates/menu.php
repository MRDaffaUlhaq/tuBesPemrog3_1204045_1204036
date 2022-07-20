<nav class="navbar navbar-expand-md sticky-top navbar-light text-black shadow p-3 mb-5 bg-white rounded flex-column">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand font-weight-bold" href="<?= base_url('home'); ?>"><i class="fa fa-crown"></i> King's Barbershop</a>
    <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
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
    </div>
</nav>