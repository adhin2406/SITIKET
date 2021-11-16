<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <a href="<?= base_url() ?>/MySistemTiket/printpdf" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Pdf</a>
</div>

<div class="laporan">
    <h1>
        Laporan Penjualan Tiket sitiket
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">kode pesan</th>
                <th scope="col">tanggal pesan</th>
                <th scope="col">tempat pesan</th>
                <th scope="col">tujuan destinasi</th>
                <th scope="col">total bayar</th>
                <th scope="col">kode kursi </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pesanan as $data) : ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $data['kode_pesan'] ?></td>
                    <td><?= date("d M Y", strtotime($data['tanggal_pesan']))  ?></td>
                    <td><?= $data['tempat_pesan'] ?></td>
                    <td><?= $data['tujuan'] ?></td>
                    <td><?= $data['total_bayar'] ?></td>
                    <td><?= $data['kode_kursi_ku'] ?></td>
                </tr>
                <?php $no++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $pager->links("pesan" && "kode_kursi", "bootstrap_pagination") ?>

<?= $this->endSection() ?>