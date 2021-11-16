<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <a href="<?= base_url() ?>/admin/hapusPetugas/<?= $penumpang['id_petugas'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i>hapus Petugas</a>
</div>

<div class="detailUser">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="bg-white p-3 text-center rounded box"><img class="img-responsive rounded-circle" src="<?= base_url() ?>/img/users/<?= $penumpang['gambar'] ?>" width="90">
                    <h5 class="mt-3 name"><?= $penumpang['username'] ?></h5>
                </div>
            </div>

            <div class="col-8">
                <div class="bg-white p-3 text-center rounded box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">email</th>
                                <th scope="col">alamat</th>
                                <th scope="col">nomer hp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $penumpang['email'] ?></td>
                                <td><?= $penumpang['alamat_petugas'] ?></td>
                                <td><?= $penumpang['nomerhp'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endsection() ?>