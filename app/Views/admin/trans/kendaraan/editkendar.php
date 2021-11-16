<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<form class="mt-5" action="<?= base_url() ?>/Admin/updatedpesawat/<?= $typekendaraan['id_rute'] ?>" method="POST" autocomplete="off">
    <?= csrf_field() ?>
    <?php foreach ($ujicoba as $data) : ?>
        <input type="hidden" name="id_trans" value="<?= $data['id_type_transportasi'] ?>">
    <?php endforeach; ?>
    <div class="form-group">
        <select class="form-control <?= ($validation->hasError('typekendaraan')) ? 'is-invalid' :  ''; ?>" name="typekendaraan">
            <option><?= $typekendaraan['transportasi'] ?></option>
            <?php foreach ($ujicoba as $data) : ?>
                <option><?= $data['kode_trans'] ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('typekendaraan'); ?>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control <?= ($validation->hasError('ruteAwal')) ? 'is-invalid' :  ''; ?>" name="ruteAwal">
            <option><?= $typekendaraan['rute_awal'] ?></option>
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
            <option><?= $typekendaraan['rute_akhir'] ?></option>
            <?php foreach ($rute as $data) : ?>
                <option><?= $data->name ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('ruteAkhir'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' :  ''; ?>" name="harga" placeholder="harga untuk rute ini" id="harga" value="<?= (old('harga') ? old('harga') : $typekendaraan['harga']) ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('harga'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="date" class="form-control  <?= ($validation->hasError('tanggal')) ? 'is-invalid' :  ''; ?>" name="tanggal" placeholder="tanggal berangkat" id="tanggal" value="<?= (old('tanggal') ? old('tanggal') : $typekendaraan['tanggal_berangkat']) ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('tanggal'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="time" class="form-control  <?= ($validation->hasError('takeOff')) ? 'is-invalid' :  ''; ?>" name="takeOff" placeholder="jam berangkat" id="takeOff" value="<?= (old('takeOff') ? old('takeOff') : $typekendaraan['takeOff']) ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('takeOff'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="time" class="form-control  <?= ($validation->hasError('landing')) ? 'is-invalid' :  ''; ?>" name="landing" placeholder="jam berangkat" id="landing" value="<?= (old('landing') ? old('landing') : $typekendaraan['landing']) ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('landing'); ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary form-control">ubah</button>
</form>


<?= $this->endSection() ?>