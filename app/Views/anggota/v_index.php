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
                <a href="<?= base_url('anggota/add') ?>" type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> &nbsp; Tambah
                </a>
            </div>

        </div>

        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped projects">
                <thead class="text-center table-dark">
                    <tr>
                        <th width="30">No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>No. Hp</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($anggota as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $i++;  ?>.</td>
                            <td><?= $data['nis'] ?></td>
                            <td>
                                <?= $data['nama_siswa'] ?> <br>
                                <?php if ($data['verifikasi'] == 0) { ?>
                                    <small class="text-danger"><i class="fas fa-times-circle"></i>&nbsp; Belum Terverivikasi</small><br>
                                    <a href="<?= base_url('anggota/verifikasi/' . $data['id_anggota']) ?>" class="btn-success btn-xs">Verifikasi Sekarang</a>
                                <?php } else { ?>
                                    <small class="text-success"><i class="fas fa-check-circle"></i>&nbsp; Verifikasi</small>
                                <?php } ?>
                            </td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td>
                                <ul class="list-inline text-center">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="<?= ($data['foto'] == null) ? base_url('/logo/noimages.png') : base_url('/img/user/' . $data['foto'])  ?>">
                                    </li>
                                </ul>
                            </td>
                            <td class="text-center" width="100">
                                <a href="<?= base_url('anggota/edit/' . $data['id_anggota']) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('anggota/delete/' . $data['id_anggota']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>