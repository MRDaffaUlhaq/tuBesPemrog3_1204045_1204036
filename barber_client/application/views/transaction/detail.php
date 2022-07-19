<div class="container">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pelayanan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white">
                    Detail Data Pelayanan
                </div>
                <div class="card-body">
                    <?php
                    foreach ($data_transaction as $row) :
                    ?>
                        <h5 class="card-title"><b>Service ID :</b><br><?= $row['t_id'] ?></h5>
                        <p class="card-text"><b>Service Name :</b><br><?= $row['name'] ?></p>
                        <p class="card-text"><b>Description :</b><br><?= $row['service_name'] ?></p>
                        <p class="card-text"><b>Dilayani Oleh :</b><br><?= $row['emp_name'] ?></p>
                        <p class="card-text"><b>Tanggal :</b><br><?= $row['date'] ?></p>
                        <p class="card-text"><b>Waktu :</b><br><?= $row['time'] ?></p>
                        <p class="card-text"><b>Total Pembayaran :</b><br><?= $row['total'] ?></p>
                        <p></p>
                        <a href="<?= base_url(); ?>transaction" class="btn btn-secondary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>