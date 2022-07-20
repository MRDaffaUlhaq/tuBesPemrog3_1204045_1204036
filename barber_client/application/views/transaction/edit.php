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
                    <?php
                    foreach ($data_transaction as $data_transaction) :
                    ?>
                        <div class="form-group row">
                            <!-- <label for="t_id" class="col-sm-2 col-form-label">ID Transaksi</label> -->
                            <div class="col-sm-10">
                                <input hidden type="text" class="form-control" id="t_id" name="t_id" value=" <?= $data_transaction['t_id']; ?>" readonly>
                                <small class="text-danger">
                                    <?php echo form_error('t_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_id" class="col-sm-2 col-formlabel">Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="customer_id" class="form-select" id="customer_id" aria-label="Default select example">
                                    <option value="<?= $data_transaction['customer_id']; ?>"><?= $data_transaction['name']; ?></option>
                                    <?php
                                    foreach ($data_customer as $row) :
                                    ?>
                                        <option value="<?= $row['customer_id']; ?>"><?= $row['name'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('customer_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_id" class="col-sm-2 col-formlabel">Pegawai</label>
                            <div class="col-sm-10">
                                <select name="emp_id" class="form-select" id="emp_id" aria-label="Default select example">
                                    <option value="<?= $data_transaction['emp_id']; ?>"><?= $data_transaction['emp_name']; ?></option>
                                    <?php
                                    foreach ($data_employees as $row) :
                                    ?>
                                        <option value="<?= $row['emp_id']; ?>"><?= $row['emp_name'] ?> - <?= $row['position'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('emp_id') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="service_id" class="col-sm-2 col-formlabel">Pelayanan</label>
                            <div class="col-sm-10">
                                <select name="service_id" class="form-select" id="service_id" aria-label="Default select example">
                                    <option value="<?= $data_transaction['service_id']; ?>"><?= $data_transaction['service_name']; ?></option>
                                    <?php
                                    foreach ($data_service as $row) :
                                    ?>
                                        <option value="<?= $row['service_id']; ?>"><?= $row['service_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('service_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="date" name="date" value="<?= $data_transaction['date']; ?>">
                                <small class="text-danger">
                                    <?php echo form_error('date') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="time" name="time" value="<?= $data_transaction['time']; ?>">
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
                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>