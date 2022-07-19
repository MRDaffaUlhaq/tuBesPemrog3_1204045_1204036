<nav class="navbar navbar-expand-md navbar-light text-black shadow p-3 mb-5 bg-white rounded">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><i class="fa fa-crown"></i> King's Barbershop</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar">
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