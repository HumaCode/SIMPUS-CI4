<div class="col-lg-12">

    <?php if (session()->getFlashdata('pesan')) { ?>

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            <?= session()->getFlashdata('pesan') ?>
        </div>

    <?php } ?>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>



        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center table-dark">
                    <tr>
                        <th width="30">No</th>
                        <th>Gambar Slider</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($slider as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $i++;  ?>.</td>
                            <td class="text-center">
                                <img src="<?= base_url('img/slider/' . $data['slider']) ?>" class="img-thumbnail img-fluid" width="300" alt="">
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $data['id_slider'] ?>"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal edit-->
<?php foreach ($slider as $data) { ?>
    <div class="modal fade " id="modalEdit<?= $data['id_slider'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart(base_url('pengaturan/editSlider/' . $data['id_slider'])) ?>
                <div class="modal-body">
                    <input type="hidden" name="id_slider" value="<?= $data['id_slider'] ?>">

                    <!-- <div class="form-group">
                        <div class="text-center">

                            <img src="<?= base_url('img/slider/' . $data['slider']) ?>" class="img-preview img-thumbnail" width="600">
                            <input type="file" name="slider" class="custom-file-input" id="file" onchange="previewImg()" accept=".jpg,.jpeg,.png">

                        </div>
                    </div> -->


                    <div class="form-group">
                        <div class="custom-file mb-2">
                            <input type="file" name="slider" class="custom-file-input" id="file" onchange="previewImg()" accept=".jpg,.jpeg,.png">
                            <label class="custom-file-label" for="file">Pilih Foto</label>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    })
</script>