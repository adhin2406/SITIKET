<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>


<div class="errors" id="errors" data-errors="<?= session()->getFlashdata('error'); ?>"></div>

<div class="pcVersion px-0 d-none d-lg-block" style="height: fit-content;">

    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left mr-3"></i>Kembali
            </a>
        </div>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4"></h1>
        <p class="lead"></p>
        <p></p>
    </div>


    <?php foreach ($penumpang as $data) : ?>
        <?php if ($data['nama_penumpang'] == null) : ?>
            <div class="alert alert-danger" role="alert">
                silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/Tampilan/setting">klik disini</a>
            </div>
        <?php elseif ($data['alamat_penumpang'] == null) : ?>
            <div class="alert alert-danger" role="alert">
                silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/Tampilan/setting">klik disini</a>
            </div>
        <?php elseif ($data['tanggal_lahir'] == null) : ?>
            <div class="alert alert-danger" role="alert">
                silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/Tampilan/setting">klik disini</a>
            </div>
        <?php elseif ($data['jenis_kelamin'] == null) : ?>
            <div class="alert alert-danger" role="alert">
                silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/Tampilan/setting">klik disini</a>
            </div>
        <?php elseif ($data['telephone'] == null) : ?>
            <div class="alert alert-danger" role="alert">
                silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/Tampilan/setting">klik disini</a>
            </div>
        <?php else : ?>
            <div class="TiketKereta">
                <div class="container">
                    <div class="col-12">
                        <div class="container">
                            <form action="<?= base_url() ?>/Tampilan/cari" method="POST" autocomplete="off">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="awal">Dari</label>
                                            <select class="form-control <?= ($validation->hasError('awal')) ? 'is-invalid' :  ''; ?>" name="awal">
                                                <?php foreach ($pesawat as $data) : ?>
                                                    <option><?= $data->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('awal'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="akhir">ke</label>
                                            <select class="form-control  <?= ($validation->hasError('akhir')) ? 'is-invalid' :  ''; ?>" name="akhir">
                                                <option value="" disabled selected>Mau kemana</option>
                                                <?php foreach ($pesawat as $data) : ?>
                                                    <option><?= $data->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('akhir'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal_berangkat" class="form-control <?= ($validation->hasError('tanggal_berangkat')) ? 'is-invalid' :  ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_berangkat'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary form-control">Ayo cari <i class="fas ml-3 fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<div class="mobile px-0 d-lg-none" style="height: max-content;">

    <a href="<?= base_url() ?>" class="BackMenu">
        <i class="fas fa-arrow-left"></i>
    </a>
    <img src="<?= base_url() ?>/img/headermenu/kereta.jpg" alt="">
    <div class="formlogin">
        <div class="container">
            <?php foreach ($penumpang as $data) : ?>
                <?php if ($data['nama_penumpang'] == null) : ?>
                    <div class="alert alert-danger" role="alert">
                        silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">klik disini</a>
                    </div>
                <?php elseif ($data['alamat_penumpang'] == null) : ?>
                    <div class="alert alert-danger" role="alert">
                        silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">klik disini</a>
                    </div>
                <?php elseif ($data['tanggal_lahir'] == null) : ?>
                    <div class="alert alert-danger" role="alert">
                        silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">klik disini</a>
                    </div>
                <?php elseif ($data['jenis_kelamin'] == null) : ?>
                    <div class="alert alert-danger" role="alert">
                        silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">klik disini</a>
                    </div>
                <?php elseif ($data['telephone'] == null) : ?>
                    <div class="alert alert-danger" role="alert">
                        silahkan lengkapi profile terlebih dahulu <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">klik disini</a>
                    </div>
                <?php else : ?>
                    <h5>KERETA API</h5>
                <?php endif; ?>
            <?php endforeach; ?>
            <form action="<?= base_url() ?>/Tampilan/cari" method="POST" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group">
                    <select class="form-control <?= ($validation->hasError('awal')) ? 'is-invalid' :  ''; ?>" name="awal">
                        <?php foreach ($pesawat as $data) : ?>
                            <option><?= $data->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('awal'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control  <?= ($validation->hasError('akhir')) ? 'is-invalid' :  ''; ?>" name="akhir">
                        <option value="" disabled selected>Mau kemana</option>
                        <?php foreach ($pesawat as $data) : ?>
                            <option><?= $data->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('akhir'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="date" name="tanggal_berangkat" class="form-control <?= ($validation->hasError('tanggal_berangkat')) ? 'is-invalid' :  ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tanggal_berangkat'); ?>
                    </div>
                </div>

                <?php foreach ($penumpang as $data) : ?>
                    <?php if ($data['nama_penumpang'] == null) : ?>
                    <?php elseif ($data['alamat_penumpang'] == null) : ?>
                    <?php elseif ($data['tanggal_lahir'] == null) : ?>
                    <?php elseif ($data['jenis_kelamin'] == null) : ?>
                    <?php elseif ($data['telephone'] == null) : ?>
                    <?php else : ?>
                        <button type="submit" class="btn btn-primary form-control mt-3" id="cari">Cari <i class="fas ml-3 fa-search"></i></button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>



<?= $this->include('Template/navbarbawah') ?>
<?= $this->endsection() ?>