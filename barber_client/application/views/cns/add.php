<div class="container pt-3">
    <div data-aos="fade-up-right">

        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Kritik dan Saran</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('cns'); ?>">List Data</a></li>
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
                            <!-- <label for="cns_id" class="col-sm-2 col-form-label">ID Kritik & Saran</label> -->
                            <div class="col-sm-10">
                                <input hidden type="text" class="form-control" id="cns_id" name="cns_id" value=" <?= set_value('cns_id'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('cns_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-2">
                                <label for="emp_id" class="col-form-label">Pelanggan</label>
                            </div>
                            <div class="col-sm-5">
                                <select name="customer_id" class="form-select" id="name" aria-label="Default select example">
                                    <option>-- Pilih Pelanggan --</option>
                                    <?php
                                    foreach ($data_customer as $row) :
                                    ?>
                                        <option value="<?= $row['customer_id']; ?>"><?= $row['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('emp_id') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="criticism" class="col-form-label">Kritik</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="criticism" name="criticism" value=" <?= set_value('criticism'); ?>"></textarea>
                                <small class="text-danger">
                                    <?php echo form_error('criticism') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="suggest" class="col-form-label">Saran</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="suggest" name="suggest" rows="3"><?= set_value('suggest'); ?></textarea>
                                <small class="text-danger">
                                    <?php echo form_error('suggest') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="rate" class="col-form-label">Rate</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="rate" name="rate" value="<?= set_value('rate'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('rate') ?>
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