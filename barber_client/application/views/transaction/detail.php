<div class="container">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Transaksi</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('transaction'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="card-title h4 text-center">
                            <b> Detail Data Transaksi </b>
                        </div>
                        <?php
                        foreach ($data_transaction as $row) :
                        ?>
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <p class="card-text p-2">Nama Pelanggan : <strong><?= $row['name'] ?></strong></p>
                                    <p class="card-text p-2">Deskripsi : <strong><?= $row['service_name'] ?></strong></p>
                                    <p class="card-text p-2">Dilayani Oleh : <strong><?= $row['emp_name'] ?></strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text p-2">Tanggal : <strong><?= $row['date'] ?></strong></p>
                                    <p class="card-text p-2">Waktu : <strong><?= $row['time'] ?></strong></p>
                                    <p class="card-text p-2">Total Pembayaran :<strong>Rp. <?= number_format($row['total']) ?></strong></p>
                                </div>
                            </div>
                            <div class="row pl-4 pr-4 p-3">
                                <a href="<?= base_url(); ?>transaction" class="btn bg-gradient-danger btn-lg w-100">Kembali</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>