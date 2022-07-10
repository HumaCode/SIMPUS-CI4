<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> &nbsp; Tambah
                </button>
            </div>

        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center table-dark">
                    <tr>
                        <th width="30">No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($kategori as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $i++;  ?>.</td>
                            <td><?= $data['nama_kategori'] ?></td>
                            <td class="text-center" width="200">
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>