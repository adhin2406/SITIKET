<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>

<div class="mobile">

    <nav class="navbar navbar-expand-lg navbar-light setting shadow fixed-top">
        <div class="container">

            <?php if (session()->get("kendaraan") === "kereta api") : ?>
                <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/kereta">
                    <i class="fa fa-chevron-left"></i> kembali
                </a>
            <?php elseif (session()->get("kendaraan") === "pesawat") : ?>
                <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/pesawat">
                    <i class="fa fa-chevron-left"></i> kembali
                </a>
            <?php endif; ?>


        </div>
    </nav>


    <div class="hasilcari">
        <div class="container">
            <form action="<?= base_url() ?>/Tampilan/cari" method="POST" autocomplete="off">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-control <?= ($validation->hasError('awal')) ? 'is-invalid' :  ''; ?>" id="awal" name="awal">
                                <option><?= $rute_awal ?></option>
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
                            <select class="form-control  <?= ($validation->hasError('akhir')) ? 'is-invalid' :  ''; ?>" id="akhir" name="akhir">
                                <option><?= $rute_akhir ?></option>
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

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php if ($tanggal) : ?>
                                <input type="date" name="tanggal_berangkat" id="tanggal" class="form-control" value="<?= $tanggal ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('akhir'); ?>
                                </div>
                            <?php else : ?>
                                <input type="date" name="tanggal_berangkat" id="tanggal" class="form-control" value="2021-10-21">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('akhir'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="tiket" id="tiket">
        <div class="container">
            <section class="container">
                <?php if ($pesawat1) : ?>
                    <div class="row">
                        <?php foreach ($pesawat1 as $data) : ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <a href="<?= base_url() ?>/Tampilan/Booking/<?= $data['mykode'] ?>">
                                    <article class="card fl-left">
                                        <section class="date">
                                            <time datetime="23th feb">
                                                <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                            </time>
                                        </section>
                                        <section class="card-cont">
                                            <small><?= $data['transportasi'] ?></small>
                                            <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>
                                            <div class="even-date">
                                                IDR <span><?= number_format($data['harga']) ?></span>
                                            </div>
                                        </section>
                                    </article>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <?php if (session()->get("kendaraan")  == "pesawat") : ?>
                        <img src="<?= base_url() ?>/img/icon/terbang.svg" class="hasilKu">
                        <p>
                            <?= session()->get('kendaraan') ?> dengan rute <?= session()->get('awal') ?> <?= session()->get('akhir') ?> tidak ditemukan
                        </p>

                    <?php else : ?>
                        <img src="<?= base_url() ?>/img/icon/notfound.svg" class="hasilKu">
                        <p>
                            <?= session()->get('kendaraan') ?> dengan rute <?= session()->get('awal') ?> <?= session()->get('akhir') ?> tidak ditemukan
                        </p>
                    <?php endif ?>


                <?php endif; ?>
            </section>
        </div>
    </div>
</div>




<?= $this->include('Template/navbarbawah') ?>
<?= $this->endsection() ?>