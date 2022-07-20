<div class="container pt-3">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent ml-n3">
            <li class="breadcrumb-item"><a>Jabatan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('job'); ?>">List Data</a></li>
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
                        <label for="position_id" class="col-sm-2 col-form-label">ID Jabatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="position_id" name="position_id" value="<?= set_value('position_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('position_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="position" name="position" value=" <?= set_value('position'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('position') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc" name="desc" rows="3"><?= set_value('desc'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('desc') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="salary" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="salary" name="salary" value="<?= set_value('salary'); ?>">
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