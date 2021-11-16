<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<form class="mt-5" action="<?= base_url() ?>/Admin/savePesawat" method="POST" autocomplete="off">
    <?= csrf_field() ?>

    <div class="form-group">
        <?php if ($type_kendaraan) : ?>
            <input type="text" class="form-control <?= ($validation->hasError('kodeTrans')) ? 'is-invalid' :  ''; ?>" name="kodeTrans" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode Transportasi" value="<?= old('kodeTrans') ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('kodeTrans'); ?>
            </div>
            <small id="emailHelp" class="form-text text-muted">silahkan masukan kode Transportasi contoh pesawat airbus.</small>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                silahkan input type Transportasi dulu <a href="<?= base_url() ?>/Admin/TypeTrans">Di sini</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <?php if ($type_kendaraan) : ?>
            <select class="form-control  <?= ($validation->hasError('typeTrans')) ? 'is-invalid' :  ''; ?>" name="typeTrans">
                <?php if (old('typeTrans')) : ?>
                    <option value="" disabled selected><?= old('typeTrans') ?></option>
                    <?php foreach ($type_kendaraan as $data) : ?>
                        <option><?= $data['nama_type'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="" disabled selected>pilih type kendaraan</option>
                    <?php foreach ($type_kendaraan as $data) : ?>
                        <option><?= $data['nama_type'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback">
                <?= $validation->getError('typeTrans'); ?>
            </div>
        <?php else : ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control  <?= ($validation->hasError('jumlahKursi')) ? 'is-invalid' :  ''; ?>" name="jumlahKursi" placeholder="jumlah kursi yang tersedia">
        <div class="invalid-feedback">
            <?= $validation->getError('jumlahKursi'); ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary form-control">save</button>
</form>


<?= $this->endSection() ?>