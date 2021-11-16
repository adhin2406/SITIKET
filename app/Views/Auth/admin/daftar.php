<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Admin atau Petugas</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div class="pc px-0 d-none d-lg-block" style="height: fit-content;">
    <form action="<?= base_url() ?>/Auth/daftaradmin" method="POST" autocomplete="off">
        <?= csrf_field() ?>
        <div class="form-group">
            <input type="text" class="form-control  <?= ($validation->hasError('username')) ? 'is-invalid' :  ''; ?>" name="username" value="<?= old("username") ?>" placeholder="Username">
            <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' :  ''; ?>" name="email" value="<?= old("email") ?>" placeholder="Email">
            <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
            </div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control  <?= ($validation->hasError('pass')) ? 'is-invalid' :  ''; ?>" value="<?= old("pass") ?>" name="pass" value="<?= old('pass') ?>" placeholder="Password">
            <div class="invalid-feedback">
                <?= $validation->getError('pass'); ?>
            </div>
        </div>
        <div class="form-group">
            <select class="form-control" id="pekerjaan" name="pekerjaan">
                <?php if (session()->get('level') == '1') : ?>
                    <option>Administrator</option>
                    <option>Petugas</option>
                <?php else : ?>
                    <option>Petugas</option>
                <?php endif; ?>
            </select>
            <small id="pekerjaan" class="form-text text-muted">User ini mau jadi apa??.</small>
        </div>
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
</div>
<?= $this->endsection() ?>