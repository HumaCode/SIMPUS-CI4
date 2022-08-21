<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">Pengaturan Web</h3>
        </div>
        <div class="card-body">

            <?php if (session()->getFlashdata('pesan')) { ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    <?= session()->getFlashdata('pesan') ?>
                </div>

            <?php } ?>

            <?= form_open_multipart(base_url('pengaturan/updateWeb')) ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sekolah">Nama Sekolah</label>
                        <input type="text" name="sekolah" id="sekolah" class="form-control" value="<?= $web['nama_sekolah'] ?>" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tlp">Telepon</label>
                        <input type="number" min="0" name="tlp" id="tlp" class="form-control" value="<?= $web['no_tlp'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control" required><?= $web['alamat'] ?></textarea>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="kec">Kecamatan</label>
                        <input type="text" name="kec" id="kec" class="form-control" value="<?= $web['kecamatan'] ?>" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="kab">Kabupaten/Kota</label>
                        <input type="text" name="kab" id="kab" class="form-control" value="<?= $web['kabupaten'] ?>" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="kd_pos">Kode Pos</label>
                        <input type="number" min="0" name="kd_pos" id="kd_pos" class="form-control" value="<?= $web['kd_pos'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 ">
                    <div class="form-group ">
                        <label for="">Preview</label> <br>
                        <div class="text-center">
                            <img src="<?= base_url('logo/' . $web['logo']) ?>" class=" img-preview" width="200">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="file">Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" onchange="previewImg()" accept=".jpg,.jpeg,.png">
                                <label class="custom-file-label" for="file">Pilih Logo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>

        </div>
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