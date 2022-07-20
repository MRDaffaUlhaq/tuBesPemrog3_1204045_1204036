<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Kritik dan Saran</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('cns'); ?>">List Data</a></li>
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
                        <label for="cns_id" class="col-sm-2 col-form-label">ID Pelayanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cns_id" name="cns_id" value=" <?= $data_cns['cns_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('cns_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="customer_id" class="col-sm-2 col-formlabel">Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value=" <?= $data_cns['customer_id']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('customer_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="criticism" class="col-sm-2 col-formlabel">Kritik</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="criticism" name="criticism" rows="3"><?= $data_cns['criticism']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('criticism') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="suggest" class="col-sm-2 col-form-label">Saran</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="suggest" name="suggest" value="<?= $data_cns['suggest']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('suggest') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="rate" name="rate" value="<?= $data_cns['rate']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('rate') ?>
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