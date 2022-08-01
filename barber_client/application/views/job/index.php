<div class="container">
    <div data-aos="fade-up-right">
        <h3 class="text-white"><?= $title ?></h3>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent ml-n3">
                <li class="breadcrumb-item"><a class="text-white">Jabatan</a></li>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="card-title">
                                <a class="btn bg-gradient-primary mb-4" href="<?= base_url('job/add/') ?>"><i class="fa fa-plus-square mr-1"></i>
                                    Tambah Data
                                </a>
                            </div>
                            <table class="table table-hover align-items-center mb-2" id="tableService">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7">NOMOR</th>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7 ps-2">JABATAN</th>
                                        <th class="text-center text-uppercase text-primary  font-weight-bolder opacity-7">GAJI</th>
                                        <th class="text-primary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_job as $row) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['position'] ?></td>
                                            <td class="text-center">Rp. <?= number_format($row['salary']) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('job/detail/' . $row['position_id']) ?>" class="btn bg-gradient-info"><i class="fa fa-info"></i></a>
                                                <a href="<?= base_url('job/edit/' . $row['position_id']) ?>" class="btn bg-gradient-warning"><i class="fa fa-edit "></i></a>
                                                <a href="<?= base_url('job/delete/' . $row['position_id']) ?>" class="btn bg-gradient-danger item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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