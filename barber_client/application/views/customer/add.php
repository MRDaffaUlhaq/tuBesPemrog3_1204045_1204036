<div class="container pt-3">
    <div data-aos="fade-up-right">
        <div class="ml-5 pl-5">
            <h3 class="text-white"><?= $title ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent ml-n3">
                    <li class="breadcrumb-item"><a class="text-white">Pelanggan</a></li>
                    <li class="breadcrumb-item "><a class="text-white" href="<?= base_url('job'); ?>">List Data</a></li>
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
                        <label for="customer_id" class="col-sm-2 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value="<?= set_value('customer_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('customer_id') ?>
                            </small>
                        </div>
                    </div> -->

                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                <label for="name" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Masukkan nomor telepon pelanggan ..." class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('name') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                <label for="telp" class="col-form-label">Telepon</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Masukkan nomor telepon pelanggan ..." class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('telp') ?>
                                </small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" placeholder="Masukkan email pelanggan ..." class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                <small class="text-danger">
                                    <?php echo form_error('email') ?>
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