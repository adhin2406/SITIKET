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
                                    <small><?= $data['kode_trans'] ?></small>
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
                    <?= session()->get('kendaraan') ?> dengan rute <?= $awal ?> <?= $akhir ?> tidak ditemukan
                </p>
            <?php else : ?>
                <img src="<?= base_url() ?>/img/icon/notfound.svg" class="hasilKu">
                <p>
                    <?= session()->get('kendaraan') ?> dengan rute <?= $awal ?> <?= $akhir ?> tidak ditemukan
                </p>
            <?php endif ?>

        <?php endif; ?>
    </section>
</div>