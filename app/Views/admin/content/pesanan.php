<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">tanggal pesan</th>
                <th scope="col">rute yang ditujju</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1; ?>
            <?php foreach ($pesan as $data) : ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= date("d F Y", strtotime($data['tanggal_berangkat'])) ?></td>
                    <td><?= $data['tujuan'] ?></td>
                    <td class="d-flex">
                        <a href="<?= base_url() ?>/MySistemTiket/detailtiket/<?= $data['kode_pesan'] ?>" class="btn btn-primary">Detail Tiket</a>

                        <?php if ((int)$data['status'] === 2) : ?>
                            <form action="<?= base_url() ?>/MySistemTiket/konfirmasi/<?= $data['id_pesan'] ?>" method="POST" class="ml-4">
                                <button type="submit" class="btn btn-success">terkonfirmasi</button>
                            </form>
                        <?php else : ?>
                            <form action="<?= base_url() ?>/MySistemTiket/konfirmasi/<?= $data['id_pesan'] ?>" method="POST" class="ml-4">
                                <button type="submit" class="btn btn-warning">konfirmasi</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php $no++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $pager->links("pesan", "bootstrap_pagination") ?>



<?= $this->endSection() ?>