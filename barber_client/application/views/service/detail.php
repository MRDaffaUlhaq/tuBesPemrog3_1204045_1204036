<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Service</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('service'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white">
                    Detail Data service
                </div>
                <div class="card-body">

                    <h5 class="card-title"><b>Service ID :</b><br><?= $data_service['service_id'] ?></h5>
                    <p class="card-text"><b>Service Name :</b><br><?= $data_service['service_name'] ?></p>
                    <p class="card-text"><b>Description :</b><br><?= $data_service['desc'] ?></p>
                    <p class="card-text"><b>Price :</b><br><?= $data_service['price'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>service" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>