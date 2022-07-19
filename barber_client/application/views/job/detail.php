<div class="container">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jabatan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jabatan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white">
                    Detail Data Jabatan
                </div>
                <div class="card-body">

                    <h5 class="card-title"><b>ID Jabatan :</b><br><?= $data_job['position_id'] ?></h5>
                    <p class="card-text"><b>Nama Jabatan :</b><br><?= $data_job['position'] ?></p>
                    <p class="card-text"><b>Deskripsi :</b><br><?= $data_job['desc'] ?></p>
                    <p class="card-text"><b>Gaji :</b><br><?= $data_job['salary'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>job" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>