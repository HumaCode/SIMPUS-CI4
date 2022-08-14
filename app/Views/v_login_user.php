<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth') ?>" class="h2"><?= $title ?></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Silahkan login terlebih dahulu</p>


            <!-- validasi error -->
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
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php } ?>

            <?= form_open('auth/cekLoginUser') ?>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
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
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            <?= form_close() ?>

        </div>
        <!-- /.card-body -->
    </div>
</div>