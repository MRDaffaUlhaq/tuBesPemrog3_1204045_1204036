<div class="container pt-3">
    <h3 class="text-white"><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a class="text-white">Jabatan</a></li>
            <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('job'); ?>">List Data</a></li>
            <li class="breadcrumb-item text-white active" aria-current="page">Edit Data</li>
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
                        <!-- <label for="position_id" class="col-sm-2 col-form-label">ID Jabatan</label> -->
                        <div class="col-sm-10">
                            <input hidden type="text" class="form-control" id="position_id" name="position_id" value=" <?= $data_job['position_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('position_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-sm-2 col-formlabel">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="position" name="position" value=" <?= $data_job['position']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('position') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-formlabel">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc" name="desc" rows="3"><?= $data_job['desc']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('desc') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="salary" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="salary" name="salary" value="<?= $data_job['salary']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('salary') ?>
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