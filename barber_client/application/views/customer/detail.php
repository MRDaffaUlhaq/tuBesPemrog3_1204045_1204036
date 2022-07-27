<div class="container">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Pelanggan</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('Pelanggan'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
                </ol>
            </nav>
        </div>

        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="card p-3 shadow mb-5 bg-white rounded">
                    <div class="card-title p-3 h4 text-center">
                        <b> Detail Data Pelanggan </b>
                    </div>

                    <div class="row p-2">
                        <div class="col-md-6">
                            <p class="card-text p-2">ID : <strong><?= $data_customer['customer_id'] ?></strong></p>
                            <p class="card-text p-2">Deskripsi : <strong><?= $data_customer['name'] ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text p-2">Tanggal : <strong><?= $data_customer['telp'] ?></strong></p>
                            <p class="card-text p-2">Waktu : <strong><?= $data_customer['email'] ?></strong></p>
                        </div>
                    </div>
                    <div class="row pl-4 pr-4 p-3">
                        <a href="<?= base_url(); ?>customer" class="btn bg-gradient-danger btn-lg w-100">Kembali</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>