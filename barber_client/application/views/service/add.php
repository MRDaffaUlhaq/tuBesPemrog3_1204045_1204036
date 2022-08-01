<div class="container pt-3">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Pelayanan</a></li>
                    <li class="breadcrumb-item "><a class="text-white" class="opacity-5 text-white" href="<?= base_url('service'); ?>">List Data</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Add Data</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card p-4 shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <?php
                        //create form
                        $attributes = array('method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes);
                        ?>
                        <!-- <div class="form-group row">
                        <label for="service_id" class="col-sm-2 col-form-label">ID Pelayanan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="service_id" name="service_id" value="<?= set_value('service_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('service_id') ?>
                            </small>
                        </div>
                    </div> -->

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="service_name" class=" col-form-label">Pelayanan</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="service_name" name="service_name" value=" <?= set_value('service_name'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('service_name') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="desc" class=" col-form-label">Deskripsi</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="desc" name="desc" rows="3"><?= set_value('desc'); ?></textarea>
                                <small class="text-danger">
                                    <?php echo form_error('desc') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="price" class=" col-form-label">Harga</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" value="<?= set_value('price'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('price') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                <a class="btn btn bg-gradient-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>