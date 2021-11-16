<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>

<div class="mobile">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left"></i> kembali
            </a>
        </div>
    </nav>
</div>


<div class="container">
    <div class="mytiket">
        <div class="row">
            <?php foreach ($kendaraan as $data) : ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <?php if ((int)$data['status'] === 2) : ?>
                        <a href="<?= base_url() ?>/Tampilan/detailtiket2/<?= $data['kode_pesan'] ?>">
                            <article class="card fl-left">
                                <section class="date">
                                    <time datetime="23th feb">
                                        <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                    </time>
                                </section>
                                <section class="card-cont">
                                    <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?> - <?= date('h:i A', strtotime($data['takeOff'])) ?></h3>

                                    <div class="even-date">
                                        <button class="btn btn-success">E-TIKET SUDAH TERBIT</button>
                                    </div>
                                </section>
                            </article>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="margin: auto;">
            <?= $pager->links("pesan" && "rute", "bootstrap_pagination") ?>
        </div>
    </div>
</div>






<?= $this->include('Template/navbarbawah') ?>
<?= $this->endsection() ?>