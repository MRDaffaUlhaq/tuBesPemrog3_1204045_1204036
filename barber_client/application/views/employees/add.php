<div class="container pt-3">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Pegawai</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('employees'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Add Data</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <?php
                        //create form
                        $attributes = array('method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes);
                        ?>
                        <div class="form-group row">
                            <!-- <label for="emp_id" class="col-sm-2 col-form-label">ID Pegawai</label> -->
                            <div class="col-sm-5">
                                <input hidden type="text" class="form-control" id="emp_id" name="emp_id" value="<?= set_value('emp_id'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('emp_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="position_id" class="col-form-label">Jabatan</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="position_id" class="form-select" id="name" aria-label="Default select example">
                                    <option>-- Pilih Jabatan --</option>
                                    <?php
                                    foreach ($data_jabatan as $row) :
                                    ?>
                                        <option value="<?= $row['position_id']; ?>"><?= $row['position'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" class="form-control" id="position_id" name="position_id" value=" <?= set_value('position_id'); ?>"> -->
                                <small class="text-danger">
                                    <?php echo form_error('position_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="emp_name" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="emp_name" name="emp_name" rows="3"><?= set_value('emp_name'); ?>
                                <small class="text-danger">
                                    <?php echo form_error('emp_name') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="telp" class="col-form-label">No Telepon</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('telp') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="address" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="address" name="address" value="<?= set_value('address'); ?>"></textarea>
                                <small class="text-danger">
                                    <?php echo form_error('address') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="bank_acc" class="col-form-label">No Rekening</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="bank_acc" name="bank_acc" value="<?= set_value('bank_acc'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('bank_acc') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                <a class="btn bg-gradient-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>