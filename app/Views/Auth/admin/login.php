<?= $this->extend('Template/auth/authlayout') ?>

<?= $this->section('content') ?>

<div class="pc px-0 d-none d-lg-block" style="height: fit-content;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form" action="<?= base_url() ?>/Auth/loginAdmin" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <?php if (!empty(session()->getFlashdata('error'))) :  ?>
                        <div class="alert alert-warning">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <div class="judul">
                        <h3>Selamat datang di sitiket</h3>
                        <p>Sign in untuk melanjutkan</p>
                    </div>
                    <div class="wrap-input100 <?= ($validation->hasError('username')) ? 'is-invalid' :  ''; ?>">
                        <input class="input100  <?= ($validation->hasError('username')) ? 'is-invalid' :  ''; ?>" type="text" name="username" value="<?= old("username") ?>">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                    <div class="wrap-input100 <?= ($validation->hasError('pass')) ? 'is-invalid' :  ''; ?>">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('pass'); ?>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            log in
                        </button>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('<?= base_url() ?>/img/icon/login.jpeg');">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile px-0 d-lg-none" style="height: max-content;">
    <h5>harap menggunakan laptop ya</h5>
</div>

<?= $this->endsection() ?>