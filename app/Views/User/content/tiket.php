<?= $this->extend('Template/Layout1') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>


<div class="pcversion1 px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left mr-3"></i>MY TIKET
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="mytiket">

            <div id="detailPack " class="container" style=" display: block;">
                <ul class="list-inline ">
                    <li id="BayarSekarang" class="list-inline-item mr-3 c-point DetailTiketSitiket" onclick="BayarSekarang()" style="color: #fe6700">
                        <h6>Bayar Sekarang</h6>
                    </li>
                    <li id="verifikasiAdmin" class="list-inline-item mr-3 c-point DetailTiketSitiket_kedua" onclick="verifikasiAdmin()" style="color: #000;">
                        <h6>Serifikasi Admin</h6>
                    </li>
                    <li id="siapDipakai" class="list-inline-item mr-3 c-point DetailTiketSitiket_kedua" style="color: #000;">
                        <h6 onclick="siapDipakai()">Siap Dipakai</h6>
                    </li>
                </ul>
            </div>


            <div id="belumContent" style="display: block">
                <div class="row">
                    <?php if ($kendaraan) : ?>
                        <?php foreach ($kendaraan as $data) : ?>
                            <?php if ((int)$data['status'] === 0) : ?>
                                <div class="col-6">
                                    <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                        <div class="border mb-4">
                                            <section class="date">
                                                <time datetime="23th feb">
                                                    <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                </time>
                                            </section>
                                            <section class="card-cont tiketing">
                                                <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>
                                                <div class="even-date">
                                                    <h3>
                                                        <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                    </h3>
                                                </div>
                                                <div class="even-info">
                                                    <p>
                                                        Rp <?= number_format($data['total_bayar']) ?>
                                                    </p>
                                                </div>
                                            </section>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="d-block text-center ilang">
                            <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                            <p>
                                belum ada e-tiket cari yuk
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div id="verifikasiContent" class="container" style="display: none">
                <div class="container">
                    <div class="row">
                        <?php if ($kendaraan) : ?>
                            <?php foreach ($kendaraan as $data) : ?>
                                <?php if ((int)$data['status'] === 1) : ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                            <div class="border mb-4">
                                                <section class="date">
                                                    <time datetime="23th feb">
                                                        <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                    </time>
                                                </section>
                                                <section class="card-cont tiketing">
                                                    <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>
                                                    <div class="even-date">
                                                        <h3>
                                                            <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                        </h3>
                                                    </div>
                                                    <div class="even-info">
                                                        <p>
                                                            Rp <?= number_format($data['total_bayar']) ?>
                                                        </p>
                                                    </div>
                                                </section>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="d-block text-center ilang">
                                <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                                <p>
                                    belum ada e-tiket cari yuk
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="selesaiContent" class="container" style="display: none">
                <div class="row">
                    <?php if ($kendaraan) : ?>
                        <?php foreach ($kendaraan as $data) : ?>
                            <?php if ((int)$data['status'] === 2) : ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                        <div class="border mb-4">
                                            <section class="date">
                                                <time datetime="23th feb">
                                                    <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                </time>
                                            </section>
                                            <section class="card-cont tiketing">
                                                <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>
                                                <div class="even-date">
                                                    <h3>
                                                        <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                    </h3>
                                                </div>
                                                <div class="even-info">
                                                    <p>
                                                        Rp <?= number_format($data['total_bayar']) ?>
                                                    </p>
                                                </div>
                                            </section>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="d-block text-center ilang">
                            <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                            <p>
                                belum ada e-tiket cari yuk
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left mr-3"></i>MY TIKET
            </a>
        </div>
    </nav>



    <div class="container">
        <div class="mytiket">
            <div id="detailPack" class="container" style=" display: block;">
                <div class="menu  px-0 d-lg-none" style="height: max-content;">
                    <div class="container">
                        <div class="row status owl-carousel owl-theme">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 menu1">
                                <a class="list-inline-item mr-3 btn" onclick="overview()" style="color: #fe6700">
                                    <div class="card">
                                        <svg width="3em" id="overview" height="3em" style="color: #fe6700" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title overview1" style="color: #fe6700" id="overview1">belum Bayar</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="menu2 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a class="list-inline-item mr-3 c-point btn" onclick="itinerary()">
                                    <div class="card">
                                        <svg id="itinerary" width="3em" height="3em" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                            <path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title itinerary1" id="itinerary1">verifikasi Admin</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="menu3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a style="color: #fe6700" class="list-inline-item mr-3 c-point btn" onclick="priceDetail()">
                                    <div class="card">
                                        <svg width="3em" id="priceDetail" height="3em" fill="currentColor" class="bi bi-ticket-perferated" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Zm3 .35v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z" />
                                        </svg>
                                        <div class="card-body">
                                            <h5 class="card-title itinerary1" id="priceDetail1">Selesai</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="overviewContent" class="container" style="display: block;">
                <div class="container">
                    <div class="row">
                        <?php if ($kendaraan) : ?>
                            <?php foreach ($kendaraan as $data) : ?>
                                <?php if ((int)$data['status'] === 0) : ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" id="tiketKU">
                                        <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                            <article class="card fl-left">
                                                <section class="date">
                                                    <time datetime="23th feb">
                                                        <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                    </time>
                                                </section>
                                                <section class="card-cont">
                                                    <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>
                                                    <div class="even-date">
                                                        <h3>
                                                            <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                        </h3>
                                                    </div>

                                                    <div class="even-footer">
                                                        <h3 title="Silahkan melakukan pembayaran sebesar">
                                                            Rp <?= number_format($data['total_bayar']) ?>
                                                        </h3>
                                                    </div>
                                                </section>
                                            </article>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="d-block text-center ilang">
                                <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                                <p>
                                    belum ada e-tiket cari yuk
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="itineraryContent" class="container" style="display: none">
                <div class="container">
                    <div class="row">
                        <?php if ($kendaraan) : ?>
                            <?php foreach ($kendaraan as $data) : ?>
                                <?php if ((int)$data['status'] === 1) : ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                            <article class="card fl-left">
                                                <section class="date">
                                                    <time datetime="23th feb">
                                                        <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                    </time>
                                                </section>
                                                <section class="card-cont">
                                                    <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?></h3>

                                                    <div class="even-date">
                                                        <h3>
                                                            <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                        </h3>
                                                    </div>
                                                </section>
                                            </article>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="d-block text-center ilang">
                                <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                                <p>
                                    belum ada e-tiket cari yuk
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="priceDetailContent" class="container" style="display: none">
                <div class="row">
                    <?php if ($kendaraan) : ?>
                        <?php foreach ($kendaraan as $data) : ?>
                            <?php if ((int)$data['status'] === 2) : ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
                                        <article class="card fl-left">
                                            <section class="date">
                                                <time datetime="23th feb">
                                                    <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                                </time>
                                            </section>
                                            <section class="card-cont">
                                                <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?> </h3>

                                                <div class="even-date">
                                                    <h3>
                                                        <?= date('h:i A', strtotime($data['takeOff'])) ?>
                                                    </h3>
                                                </div>
                                            </section>
                                        </article>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="d-block text-center ilang">
                            <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                            <p>
                                belum ada e-tiket cari yuk
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>



            <!-- <div class="row">
                <?php if ($kendaraan) : ?>
                    <?php foreach ($kendaraan as $data) : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                            <?php if ((int)$data['status'] === 2) : ?>
                                <a href="<?= base_url() ?>/Tampilan/detailtiket/<?= $data['kode_pesan'] ?>">
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
                            <?php elseif ((int)$data['status'] === 1) : ?>
                                <a id="tunggu<?= $data['kode_pesan'] ?>" href="#">
                                    <article class="card fl-left">
                                        <section class="date">
                                            <time datetime="23th feb">
                                                <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                            </time>
                                        </section>
                                        <section class="card-cont">
                                            <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?> - <?= date('h:i A', strtotime($data['takeOff'])) ?></h3>

                                            <div class="even-date">
                                                <button class="btn btn-warning text-white">tiket sedang dalam proses verifikasi</button>
                                            </div>
                                        </section>
                                    </article>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url() ?>/Tampilan/pembayaran/<?= $data['kode_pesan'] ?>">
                                    <article class="card fl-left">
                                        <section class="date">
                                            <time datetime="23th feb">
                                                <span><?= date("d M", strtotime($data['tanggal_berangkat'])) ?></span>
                                            </time>
                                        </section>
                                        <section class="card-cont">
                                            <h3><?= $data['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $data['rute_akhir'] ?> - <?= date('h:i A', strtotime($data['takeOff'])) ?></h3>

                                            <div class="even-date">
                                                <button class="btn btn-danger text-white">Silahkan melakukan pembayaran</button>
                                            </div>
                                        </section>
                                    </article>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="d-block text-center ilang">
                        <img src="<?= base_url() ?>/img/icon/notfoun.svg" class="hasilKu">
                        <p>
                            belum ada e-tiket cari yuk
                        </p>
                    </div>
                <?php endif; ?>
            </div> -->
        </div>
    </div>
</div>

<?= $this->include('Template/navbarbawah') ?>
<?= $this->endSection() ?>