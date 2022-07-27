<div class="container">
    <h3 class="text-white"><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a class="text-white">Kritik & Saran</a></li>
            <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('employees'); ?>">List Data</a></li>
            <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white">
                    Detail Data Kritik & Saran
                </div>
                <div class="card-body">
                    <?php
                    foreach ($data_cns as $row) :
                    ?>
                        <h5 class="card-title"><b>Nomor :</b><br><?= $row['cns_id'] ?></h5>
                        <p class="card-text"><b>Nama Pelanggan :</b><br><?= $row['name'] ?></p>
                        <p class="card-text"><b>Kritik :</b><br><?= $row['criticism'] ?></p>
                        <p class="card-text"><b>Saran :</b><br><?= $row['suggest'] ?></p>
                        <p class="card-text"><b>Rate :</b><br><?= $row['rate'] ?></p>
                        <p></p>
                        <a href="<?= base_url(); ?>cns" class="btn btn-secondary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>