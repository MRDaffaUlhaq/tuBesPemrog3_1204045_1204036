<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pelanggan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('job'); ?>">List Data</a></li>
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
                        <label for="customer_id" class="col-sm-2 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value=" <?= $data_customer['customer_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('customer_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-formlabel">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value=" <?= $data_customer['name']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $data_customer['telp']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('telp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $data_customer['email']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('email') ?>
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