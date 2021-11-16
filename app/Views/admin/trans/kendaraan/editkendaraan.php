<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<form class="mt-5" action="<?= base_url() ?>/Admin/updatedKendaraan/<?= $typeKendaraan['id_transportasi'] ?>" method="POST" autocomplete="off">
    <?= csrf_field() ?>
    <div class="form-group">
        <input type="text" class="form-control <?= ($validation->hasError('kodeTrans')) ? 'is-invalid' :  ''; ?>" name="kodeTrans" placeholder="kode Transportasi" value="<?= $typeKendaraan['kode_trans'] ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('kodeTrans'); ?>
        </div>
        <small id="emailHelp" class="form-text text-muted">silahkan masukan kode Transportasi contoh pesawat airbus.</small>
    </div>
    <div class="form-group">
        <input type="text" class="form-control  <?= ($validation->hasError('jumlahKursi')) ? 'is-invalid' :  ''; ?>" name="jumlahKursi" placeholder="jumlah kursi yang tersedia" value="<?= $typeKendaraan['jumlah_kursi'] ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('jumlahKursi'); ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary form-control">save</button>
</form>


<?= $this->endSection() ?>