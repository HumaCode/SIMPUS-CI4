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
            <table class="table table-bordered projects">
                <thead class="text-center table-dark">
                    <tr>
                        <th width="30">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($user as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $i++;  ?>.</td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td>
                                <ul class="list-inline text-center">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="<?= ($data['foto'] == null) ? base_url('/AdminLTE3/dist/img/avatar.png') : base_url('/img/user/' . $data['foto'])  ?>">
                                    </li>
                                </ul>
                            </td>
                            <td class="text-center" width="200">
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $data['id_user'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $data['id_user'] ?>"><i class="fas fa-trash"></i></a>
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
                <?= form_open_multipart(base_url('user/tambah')) ?>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama User" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option disabled selected>-- Pilih --</option>
                                <option value="0">Admin</option>
                                <option value="1">Anggota</option>
                            </select>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label for="level">Foto</label>
                    <div class="custom-file mb-2">
                        <input type="file" name="file" class="custom-file-input" id="file" onchange="previewImg()" accept=".jpg,.jpeg,.png">
                        <label class="custom-file-label" for="file">Pilih Foto</label>
                    </div>
                </div>
                <div class="text-center">
                    <img src="<?= base_url() ?>/AdminLTE3/dist/img/avatar.png" class=" img-preview" width="200">
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
<?php foreach ($user as $data) { ?>
    <div class="modal fade" id="modalEdit<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Data <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart(base_url('user/edit/' . $data['id_user'])) ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" required value="<?= $data['nama_user'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required value="<?= $data['email'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option disabled>-- Pilih --</option>

                            <option value="0" <?= ($data['level'] == 0) ? 'selected' : '' ?>>Admin</option>
                            <option value="1" <?= ($data['level'] == 1) ? 'selected' : '' ?>>Anggota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level">Foto</label>
                        <div class="custom-file mb-2">
                            <input type="file" name="file" class="custom-file-input" onchange="previewImg()" id="file" accept=".jpg,.jpeg,.png">
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

<!-- Modal hapus-->
<?php foreach ($user as $data) { ?>
    <div class="modal fade" id="modalHapus<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                    <a href="<?= base_url('user/hapus/' . $data['id_user']) ?>" class="btn btn-primary btn-sm">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



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