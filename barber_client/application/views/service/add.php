<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Service</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('service'); ?>">List Data</a></li>
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
                        <label for="service_id" class="col-sm-2 col-form-label">Service ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="service_id" name="service_id" value="<?= set_value('service_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('service_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="service_name" class="col-sm-2 col-form-label">Service Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="service_name" name="service_name" value=" <?= set_value('service_name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('service_name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc" name="desc" rows="3"><?= set_value('desc'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('desc') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="price" name="price" value="<?= set_value('price'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('price') ?>
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