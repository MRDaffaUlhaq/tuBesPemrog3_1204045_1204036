<div class="container">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Kritik & Saran</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('employees'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-md-10 mx-auto">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-title p-3 h4 text-center">
                        Detail Data Kritik & Saran
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($data_cns as $row) :
                        ?>
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <p class="card-text"><b>Nomor :</b><br><?= $row['cns_id'] ?></p>
                                    <p class="card-text"><b>Nama Pelanggan :</b><br><?= $row['name'] ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text"><b>Kritik :</b><br><?= $row['criticism'] ?></p>
                                    <p class="card-text"><b>Saran :</b><br><?= $row['suggest'] ?></p>
                                </div>
                            </div>
                            <div class="row p-2 text-center">
                                <div class="col-md-8 mx-auto">
                                    <p class="card-text"><b>Rate : </b><?= $row['rate'] ?></p>
                                </div>
                            </div>
                            <div class="row pl-4 pr-4 p-3">
                                <a href="<?= base_url(); ?>cns" class="btn bg-gradient-danger btn-lg w-100">Kembali</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>