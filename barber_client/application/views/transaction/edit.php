<div class="container pt-3">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Transaksi</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('transaction'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card p-4  shadow mb-5 bg-white rounded">
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
                                <div class="col-sm-2">
                                    <label for="customer_id" class="col-form-label">Pelanggan</label>
                                </div>
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
                                <div class="col-sm-2">
                                    <label for="emp_id" class="col-form-label">Pegawai</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="emp_id" class="form-select" id="emp_id" aria-label="Default select example">
                                        <option value="<?= $data_transaction['emp_id']; ?>"><?= $data_transaction['emp_name']; ?> </option>
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
                                <div class="col-sm-2">
                                    <label for="service_id" class="col-form-label">Pelayanan</label>
                                </div>
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
                                <div class="col-sm-2">
                                    <label for="date" class="col-form-label">Tanggal</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date" value="<?= $data_transaction['date']; ?>">
                                    <small class="text-danger">
                                        <?php echo form_error('date') ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="time" class="col-form-label">Waktu</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="time" name="time" value="<?= $data_transaction['time']; ?>">
                                    <small class="text-danger">
                                        <?php echo form_error('time') ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="total" class="col-form-label">Total</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="total" name="total" value="<?= $data_transaction['total']; ?>">
                                    <small class="text-danger">
                                        <?php echo form_error('total') ?>
                                    </small>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10 offset-md-2">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                    <a class="btn bg-gradient-secondary" href="javascript:history.back()">Kembali</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>