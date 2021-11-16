<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="errors" id="errors" data-errors="<?= session()->getFlashdata('error'); ?>"></div>


<div class="ubahakun px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/setting">Kembali</a>
        </div>
    </nav>
    <div class="container">
        <form action="<?= base_url(); ?>/Auth/updatedPassword/<?= session()->get('id'); ?>" class="ubahpassword" method="POST" autocomplete="off">
            <?= csrf_field(); ?>
            <div class="form-group">
                <input type="password" class="form-control <?= ($validation->hasError('passwordlama')) ? 'is-invalid' :  ''; ?>" name="passwordlama" placeholder="Enter your old password">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordlama'); ?>
                </div>
                <input type="password" class="form-control mt-1 <?= ($validation->hasError('passwordbaru')) ? 'is-invalid' :  ''; ?>" name="passwordbaru" placeholder="New password">
                <div class="invalid-feedback">
                    <?= $validation->getError('passwordbaru'); ?>
                </div>
                <input type="password" class="form-control mt-1 <?= ($validation->hasError('konfirmasi')) ? 'is-invalid' :  ''; ?>" name="konfirmasi" placeholder="Confirm new password">
                <div class="invalid-feedback">
                    <?= $validation->getError('konfirmasi'); ?>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="updated">Update password</button>
            </div>
        </form>
    </div>
</div>


<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>