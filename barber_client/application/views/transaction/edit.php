<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Transaksi</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="t_id" class="col-sm-2 col-form-label">ID Transaksi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="t_id" name="t_id" value=" <?= $data_transaction['t_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('t_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="customer_id" class="col-sm-2 col-formlabel">Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value=" <?= $data_transaction['customer_id']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('customer_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emp_id" class="col-sm-2 col-formlabel">Pegawai</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="emp_id" name="emp_id" rows="3"><?= $data_transaction['emp_id']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('emp_id') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="service_id" class="col-sm-2 col-form-label">Service</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="service_id" name="service_id" value="<?= $data_transaction['service_id']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('service_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="date" name="date" value="<?= $data_transaction['date']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('date') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="time" name="time" value="<?= $data_transaction['time']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('time') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="total" name="total" value="<?= $data_transaction['total']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('total') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>