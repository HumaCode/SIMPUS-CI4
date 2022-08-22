<div class="col-lg-12">
    <div class="card">
        <div class="card-header card-outline card-primary">
            <h3 class="card-title">Tambah</h3>
        </div>

        <div class="card-body">

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


            <?= form_open_multipart(base_url('anggota/addData')) ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama User" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="number" min="0" name="nis" class="form-control" id="nis" placeholder="Masukan NIS" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option disabled selected>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="no_hp">No. Hp</label>
                        <input type="number" min="0" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan No. Hp" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option disabled selected>-- Pilih Kelas --</option>
                            <?php foreach ($kelas as $data) { ?>
                                <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Preview</label>
                        <div class="text-center">
                            <img src="<?= base_url() ?>/logo/noimages.png" class="img-preview img-thumbnail" width="200">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="level">Foto</label>
                        <div class="custom-file mb-2">
                            <input type="file" name="file" class="custom-file-input" id="file" onchange="previewImg()" accept=".jpg,.jpeg,.png">
                            <label class="custom-file-label" for="file">Pilih Foto</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="<?= base_url('anggota') ?>" type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <?= form_close() ?>
    </div>
</div>


<script>
    function previewImg() {
        const file = document.querySelector('#file');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = file.files[0].name;

        const fileSampul = new FileReader();
        // ambil url tempat penyimpanan gambar
        fileSampul.readAsDataURL(file.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>