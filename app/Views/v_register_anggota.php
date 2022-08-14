<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth') ?>" class="h2"><?= $title ?></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Silahkan register terlebih dahulu</p>


            <?= form_open() ?>
            <div class="input-group mb-3">
                <input type="number" min="0" name="nis" class="form-control" placeholder="NIS">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <select name="jk" class="form-control" id="jk">
                    <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <select name="kelas" class="form-control" id="kelas">
                    <option selected disabled value="">-- Pilih Kelas --</option>
                    <?php foreach ($kelas as $data) { ?>
                        <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
                    <?php } ?>

                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="number" min="0" name="no_hp" class="form-control" placeholder="No. Handphone">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password2" class="form-control" placeholder="Ulangi Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-check-circle"></span>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-6">
                    <a href="<?= base_url('auth/loginAnggota') ?>" class="btn btn-danger btn-block">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->

            </div>
            <!-- <div class="text-center mt-2 mb-2">--Atau--</div> -->
            <?= form_close() ?>

        </div>
        <!-- /.card-body -->
    </div>
</div>