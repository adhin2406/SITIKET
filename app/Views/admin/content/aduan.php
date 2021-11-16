<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>


<div class="container">
    <div class="mytiket">
        <div class="row">
            <?php if ($aduan) : ?>
                <?php foreach ($aduan as $data) : ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                        <article class=" fl-left">
                            <section class="date">
                                <time datetime="23th feb">
                                    <span><?= date("d M", strtotime($data['created_at'])) ?></span>
                                </time>
                            </section>
                            <section class="card-cont">
                                <h3><?= $data['nama_lengkap'] ?></h3>
                                <div class="even-date">
                                    <p>
                                        <?= $data['pengaduan'] ?>
                                    </p>
                                </div>
                            </section>
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="d-block text-center ilang">
                    <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                    <p>
                        Alhamdulillah belum ada yang mengadu ke kita
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>


<?= $this->endSection() ?>