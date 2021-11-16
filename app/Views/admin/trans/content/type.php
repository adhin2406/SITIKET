<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>


<form class="mt-5" action="<?= base_url() ?>/Admin/saveType" method="POST" autocomplete="off">
    <?= csrf_field() ?>
    <!-- <div class="file" id="fileada">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-sm btn-primary shadow-sm pesawat0" id="pesawat"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah type</a>
            </div>

            <select class="form-control mb-2 <?= ($validation->hasError('type')) ? 'is-invalid' :  ''; ?>" name="type">
                <option value="" disabled selected>pilih type kendaraan</option>
                <?php foreach ($type as $data) : ?>
                    <option><?= $data['nama_type'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback mb-2">
                <?= $validation->getError('type'); ?>
            </div>
        </div>

        <div id="registration" class="site-section border-bottom" style="display: none;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-sm btn-primary shadow-sm pesawat0" id="pesawat1"><i class="fas fa-arrow-left fa-sm text-white-50"></i> pakai data yang sudah ada </a>
            </div>
            <div class="form-group">
                <input type="text" class="form-control <?= ($validation->hasError('typekendaraan')) ? 'is-invalid' :  ''; ?>" name="typekendaraan" placeholder="nama type kendaraan">
                <div class="invalid-feedback">
                    <?= $validation->getError('typekendaraan'); ?>
                </div>
            </div>
        </div> -->
    <div class="form-group">
        <input type="text" class="form-control <?= ($validation->hasError('typekendaraan')) ? 'is-invalid' :  ''; ?>" name="typekendaraan" placeholder="nama type kendaraan">
        <div class="invalid-feedback">
            <?= $validation->getError('typekendaraan'); ?>
        </div>
    </div>






    <button type="submit" class="btn btn-primary form-control">Lanjutkan</button>
</form>


<?= $this->endSection() ?>