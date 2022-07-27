<div class="container">
    <div data-aos="fade-up-right">

        <h3 class="text-white"><?= $title ?></h3>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent ml-n3">
                <li class="breadcrumb-item"><a class="text-white">Pelanggan</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">List Data</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">

                <div mb-2>
                    <!-- Menampilkan flash data (pesan saat data error)-->
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error! <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title pl-3 pt-3">
                        <a class="btn bg-gradient-primary mb-4" href="<?= base_url('customer/add/') ?>"><i class="fa fa-plus-square mr-1"></i>
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-items-center mb-2" id="tableService">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7">NOMOR</th>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7 ps-2">PELANGGAN</th>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7">TELEPON</th>
                                        <th class="text-primary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_customer as $row) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $row['name'] ?></td>
                                            <td class="text-center"><?= $row['telp'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('customer/detail/' . $row['customer_id']) ?>" class="btn bg-gradient-info btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail" data-container="body" data-animation="true"><i class="fa fa-eye "></i></a>
                                                <a href="<?= base_url('customer/edit/' . $row['customer_id']) ?>" class="btn bg-gradient-warning btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Data" data-container="body" data-animation="true"><i class="fa fa-edit "></i></a>
                                                <a href="<?= base_url('customer/delete/' . $row['customer_id']) ?>" class="btn bg-gradient-danger item-delete btn-tooltip tombol-hapus" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data" data-container="body" data-animation="true"><i class="fa fa-trash "></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableService').DataTable();
</script>