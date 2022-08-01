<div class="container">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Pegawai</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('employees'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">

                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-title p-3 h4 text-center">
                        <b> Detail Data Pegawai </b>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($data_employees as $row) :
                        ?>
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <p class="card-text"><b>Nomor :</b><br><?= $row['emp_id'] ?></p>
                                    <p class="card-text"><b>Jabatan :</b><br><?= $row['position'] ?></p>
                                    <p class="card-text"><b>Nama Pegawai :</b><br><?= $row['emp_name'] ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text"><b>No Telepon :</b><br><?= $row['telp'] ?></p>
                                    <p class="card-text"><b>Alamat :</b><br><?= $row['address'] ?></p>
                                    <p class="card-text"><b>No Rekening :</b><br><?= $row['bank_acc'] ?></p>
                                </div>
                            </div>
                            <div class="row pl-4 pr-4 p-3">
                                <div class="col-md-6 mx-auto">
                                    <p class="card-text"><b>Gaji : </b> <?= $row['salary'] ?></p>
                                </div>
                            </div>
                            <div class="row pl-4 pr-4 p-3">
                                <a href="<?= base_url(); ?>employees" class="btn bg-gradient-danger btn-lg w-100">Kembali</a>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>