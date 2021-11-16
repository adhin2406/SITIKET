<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <a href="<?= base_url() ?>/Admin/pesawatTambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="pesawat"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah data</a>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nama kendaraan</th>
                <th scope="col">kursi yang tersedia</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1 ?>
            <?php foreach ($type_kendaraan as $data) : ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $data['kode_trans'] ?></td>
                    <td><?= $data['jumlah_kursi'] ?></td>
                    <td class="d-flex">
                        <a href="<?= base_url() ?>/Admin/Editkendaraan/<?= $data['kodeTrans'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt mr-2 fa-sm"></i> Edit</a>
                        <form action="<?= base_url() ?>/Admin/deleteData/<?= $data['id_transportasi'] ?>" method="post" autocomplete="off" class="ml-2">
                            <?= csrf_field() ?>
                            <input type="hidden" name="__method" value="DELETE">
                            <button type="submit" class="btn btn-danger" id="delete<?= $data['kodeTrans'] ?>"><i class="fas fa-trash mr-2 fa-sm"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $no++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ?>