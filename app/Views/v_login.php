<div class="card-header text-center">
    <a href="<?= base_url() ?>" class="h1">Sistem Informasi Perpustakaan</a>
</div>

<div class="row">
    <div class="login-box">
        <div class="col-lg-12 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Admin</h3>

                    <p>Login sebagai admin</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="<?= base_url('auth/loginUser') ?>" class="small-box-footer">Login &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="login-box">
        <div class="col-lg-12 col-6">
            <!-- small box -->
            <div class="small-box bg-cyan">
                <div class="inner">
                    <h3>Anggota</h3>

                    <p>Login sebagai anggota</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="<?= base_url('auth/loginAnggota') ?>" class="small-box-footer">Login &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>