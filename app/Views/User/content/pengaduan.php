<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>
<div class="ubahakun px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/setting">Kembali</a>
        </div>
    </nav>


    <div class="container" style="margin-top: 30%;">
        <form action="<?= base_url() ?>/Tampilan/aduan" method="POST" autocomplete="off">
            <div class="form-group">
                <textarea class="form-control <?= ($validation->hasError('aduan')) ? 'is-invalid' :  ''; ?>" name="aduan" rows="10" placeholder="complaint form"><?= old('aduan') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('aduan'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
</div>


<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>