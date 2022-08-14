<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth') ?>" class="h2"><?= $title ?></a>
        </div>
        <div class="card-body">

            <?php
            $errors = session()->getFlashdata('errors');

            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php if (session()->getFlashdata('pesan')) { ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    <?= session()->getFlashdata('pesan') ?>
                </div>

            <?php } ?>

            <p class="login-box-msg">Silahkan login terlebih dahulu</p>

            <?= form_open(base_url('auth/cekLoginAnggota')) ?>
            <div class="input-group mb-3">
                <input type="number" min="0" name="nis" class="form-control" placeholder="NIS">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="<?= base_url('auth') ?>" class="btn btn-danger btn-block">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->

            </div>
            <!-- <div class="text-center mt-2 mb-2">--Atau--</div> -->
            <?= form_close() ?>


            <div class="social-auth-links text-center mb-3">
                <p>- Atau -</p>
                <a href="<?= base_url('auth/register') ?>" class="btn btn-block btn-secondary">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Anggota
                </a>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
</div>