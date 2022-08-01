<div class="container">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Jabatan</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('jabatan'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-title p-3 h4 text-center">
                        Detail Data Jabatan
                    </div>
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-md-6">
                                <p class="card-text"><b>ID Jabatan : </b><br><?= $data_job['position_id'] ?></p>
                                <p class="card-text"><b>Nama Jabatan : </b><br><?= $data_job['position'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><b>Deskripsi : </b><br><?= $data_job['desc'] ?></p>
                                <p class="card-text"><b>Price : </b><br>Rp. <?= number_format($data_job['salary']) ?></p>
                            </div>
                        </div>
                        <div class="row pl-4 pr-4 p-3">
                            <a href="<?= base_url(); ?>job" class="btn bg-gradient-danger btn-lg w-100">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>