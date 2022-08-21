<div class="col-md-12">
    <?php if ($profil['verifikasi'] == 0) { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
            Akun anda belum diverifikasi oleh petugas perpustakaan, silahkan hubungi petugas perpustakaan.
        </div>
    <?php } else { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Selamat!</h5>
            Akun anda sudah diverifikasi.
        </div>
    <?php } ?>
</div>

<div class="col-sm-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class=" img-fluid img-thumbnail" src="<?= ($profil == '') ? base_url('logo/noimages.png') : base_url('img/user/' . $profil['foto']) ?>" alt="User" width="300">
            </div>

        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-sm-9">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-pencil-alt"></i> &nbsp; Edit
                </button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td width="300">Nama Siswa</td>
                    <td width="30">:</td>
                    <td><?= $profil['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?= $profil['nis'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $profil['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $profil['alamat'] ?></td>
                </tr>
                <tr>
                    <td>No. Hp</td>
                    <td>:</td>
                    <td><?= $profil['no_hp'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $profil['nama_kelas'] ?></td>
                </tr>

            </table>
        </div>

        <div class="card-footer">

        </div>
    </div>
</div>