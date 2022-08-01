<div class="container pt-3">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Jabatan</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('job'); ?>">List Data</a></li>
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
                        <!-- <div class="form-group row">
                        <label for="position_id" class="col-sm-2 col-form-label">ID Jabatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="position_id" name="position_id" value="<?= set_value('position_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('position_id') ?>
                            </small>
                        </div>
                    </div> -->

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="position" class="col-form-label">Jabatan</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="position" name="position" value=" <?= set_value('position'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('position') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="desc" class="col-form-label">Deskripsi</label>
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
                                <label for="salary" class="col-form-label">Gaji</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="salary" name="salary" value="<?= set_value('salary'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('salary') ?>
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