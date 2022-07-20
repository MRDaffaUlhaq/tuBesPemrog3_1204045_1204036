<div class="container">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Pegawai</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('employees'); ?>">List Data</a></li>
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
                    foreach ($data_employees as $row) :
                    ?>
                        <h5 class="card-title"><b>Nomor :</b><br><?= $row['emp_id'] ?></h5>
                        <p class="card-text"><b>Jabatan :</b><br><?= $row['position'] ?></p>
                        <p class="card-text"><b>Nama Pegawai :</b><br><?= $row['emp_name'] ?></p>
                        <p class="card-text"><b>No Telepon :</b><br><?= $row['telp'] ?></p>
                        <p class="card-text"><b>Alamat :</b><br><?= $row['address'] ?></p>
                        <p class="card-text"><b>No Rekening :</b><br><?= $row['bank_acc'] ?></p>
                        <p class="card-text"><b>Gaji :</b><br><?= $row['salary'] ?></p>
                        <p></p>
                        <a href="<?= base_url(); ?>employees" class="btn btn-secondary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>