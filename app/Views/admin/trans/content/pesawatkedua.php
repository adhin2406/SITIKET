<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<form class="mt-5" action="<?= base_url() ?>/Admin/savePesawatkedua" method="POST" autocomplete="off">
    <?= csrf_field() ?>
    <?php foreach ($mytrans as $data) : ?>
        <input type="hidden" name="id_trans" value="<?= $data['id_type_transportasi'] ?>">
    <?php endforeach; ?>
    <div class="form-group">
        <select class="form-control <?= ($validation->hasError('typekendaraan')) ? 'is-invalid' :  ''; ?>" name="typekendaraan">
            <?php if (old('typekendaraan')) : ?>
                <option value="" disabled selected><?= old('typekendaraan') ?></option>
            <?php else : ?>
                <option value="" disabled selected>type kendaraan yang diinginkan untuk rute ini</option>
            <?php endif; ?>
            <?php foreach ($mytrans as $data) : ?>
                <option><?= $data['kode_trans'] ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('typekendaraan'); ?>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control <?= ($validation->hasError('ruteAwal')) ? 'is-invalid' :  ''; ?>" name="ruteAwal">
            <?php if (old('ruteAwal')) : ?>
                <option value="" disabled selected><?= old('ruteAwal') ?></option>
            <?php else : ?>
                <option value="" disabled selected>pilih rute awal</option>
            <?php endif; ?>
            <?php foreach ($rute as $data) : ?>
                <option><?= $data->name ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('ruteAwal'); ?>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control <?= ($validation->hasError('ruteAkhir')) ? 'is-invalid' :  ''; ?>" name="ruteAkhir">
            <?php if (old('ruteAwal')) : ?>
                <option value="" disabled selected><?= old('ruteAkhir') ?></option>
            <?php else : ?>
                <option value="" disabled selected>pilih tujuan akhir</option>
            <?php endif; ?>
            <?php foreach ($rute as $data) : ?>
                <option><?= $data->name ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('ruteAkhir'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' :  ''; ?>" name="harga" placeholder="harga untuk rute ini" id="harga" value="<?= old("harga") ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('harga'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="date" class="form-control  <?= ($validation->hasError('tanggal')) ? 'is-invalid' :  ''; ?>" name="tanggal" placeholder="tanggal berangkat" id="tanggal" value="<?= old("tanggal") ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('tanggal'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="time" class="form-control  <?= ($validation->hasError('takeOff')) ? 'is-invalid' :  ''; ?>" name="takeOff" placeholder="jam berangkat" id="takeOff" value="<?= old('takeOff') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('takeOff'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="time" class="form-control  <?= ($validation->hasError('landing')) ? 'is-invalid' :  ''; ?>" name="landing" placeholder="jam berangkat" id="landing" value="<?= old('landing') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('landing'); ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary form-control">save</button>
</form>


<?= $this->endSection() ?>