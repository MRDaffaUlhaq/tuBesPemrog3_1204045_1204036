<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pegawai</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('employees'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="emp_id" class="col-sm-2 col-form-label">ID Pegawai</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="emp_id" name="emp_id" value="<?= set_value('emp_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('emp_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position_id" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="position_id" name="position_id" value=" <?= set_value('position_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('position_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emp_name" class="col-sm-2 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="emp_name" name="emp_name" rows="3"><?= set_value('emp_name'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('emp_name') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('telp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="address" name="address" value="<?= set_value('address'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('address') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bank_acc" class="col-sm-2 col-form-label">No Rekening</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="bank_acc" name="bank_acc" value="<?= set_value('bank_acc'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('bank_acc') ?>
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