<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>


<form class="mt-5" action="<?= base_url() ?>/Admin/updatedType/<?= $typeKendaraan['id_type_transportasi'] ?>" method="POST" autocomplete="off">
    <div class="form-group">
        <input type="text" class="form-control <?= ($validation->hasError('typekendaraan')) ? 'is-invalid' :  ''; ?>" name="typekendaraan" placeholder="nama type kendaraan" value="<?= $typeKendaraan['nama_type'] ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('typekendaraan'); ?>
        </div>
    </div>

    <button type="submit" class="btn btn-primary form-control">ubah</button>
</form>


<?= $this->endSection() ?>