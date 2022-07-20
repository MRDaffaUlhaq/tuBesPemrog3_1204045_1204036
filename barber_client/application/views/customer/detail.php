<div class="container">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Pelanggan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('Pelanggan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white">
                    Detail Data Pelanggan
                </div>
                <div class="card-body">

                    <h5 class="card-title"><b>ID Pelanggan :</b><br><?= $data_customer['customer_id'] ?></h5>
                    <p class="card-text"><b>Nama Pelanggan :</b><br><?= $data_customer['name'] ?></p>
                    <p class="card-text"><b>No Telepon :</b><br><?= $data_customer['telp'] ?></p>
                    <p class="card-text"><b>Email :</b><br><?= $data_customer['email'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>customer" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>