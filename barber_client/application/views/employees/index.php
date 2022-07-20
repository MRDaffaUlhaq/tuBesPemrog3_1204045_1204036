<div class="container">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-dark mb-2" href="<?= base_url('employees/add/') ?>"><i class="fa fa-plus-square mr-1"></i>Tambah Data</a>
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
                        <table class="table table-bordered table-striped table-hover text-sm" id="tableService">
                            <thead>
                                <tr class="bg-dark text-white text-center">
                                    <th>NOMOR</th>
                                    <th>NAMA PEGAWAI</th>
                                    <th>ALAMAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_employees as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['emp_id'] ?></td>
                                        <td><?= $row['emp_name'] ?></td>
                                        <td class="text-justify"><?= $row['address'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Employees/detail/' . $row['emp_id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('Employees/edit/' . $row['emp_id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit "></i></a>
                                            <a href="<?= base_url('Employees/delete/' . $row['emp_id']) ?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableService').DataTable();
</script>