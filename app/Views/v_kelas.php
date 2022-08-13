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

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> &nbsp; Tambah
                </button>
            </div>

        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center table-dark">
                    <tr>
                        <th width="30">No</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($kelas as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $i++;  ?>.</td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td class="text-center" width="200">
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $data['id_kelas'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $data['id_kelas'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('kelas/tambah')) ?>

                <div class="form-group">
                    <label for="kelas">Nama Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Nama Kelas">
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



<!-- Modal edit-->
<?php foreach ($kelas as $data) { ?>
    <div class="modal fade" id="modalEdit<?= $data['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Data <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('kelas/edit/' . $data['id_kelas'])) ?>

                    <div class="form-group">
                        <label for="kelas">Nama Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $data['nama_kelas'] ?>">
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

<!-- Modal hapus-->
<?php foreach ($kelas as $data) { ?>
    <div class="modal fade" id="modalHapus<?= $data['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus Data <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Apakah yakin akan menghapus data ini..?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('kelas/hapus/' . $data['id_kelas']) ?>" class="btn btn-primary btn-sm">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>