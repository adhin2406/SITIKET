<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success') ?>"></div>

<div class="pcversion1 px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/tiket">
                <i class=" fa fa-chevron-left mr-4"></i>MY TIKET
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="mytiket">
            <div class="detailTiketKu">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><?= $kendaraan['transportasi'] ?></h5>
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">Kode booking</h5>
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">rute</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-5">
                            <ul class="list-unstyled mydetail">
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 judul"><?= $kendaraan['transportasi'] ?></h5>
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><?= $kendaraan['kode_pesan'] ?></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><?= $kendaraan['rute_awal'] ?>/<?= $kendaraan['rute_akhir'] ?></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 berangkat">berangkat <?= date(
                                                                                        'h:i A',
                                                                                        strtotime($kendaraan['takeOff'])
                                                                                    ) ?></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul class="list-unstyled mydetail">
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 tanggal"><?= date(
                                                                            'l d M Y',
                                                                            strtotime(
                                                                                $kendaraan['tanggal_berangkat']
                                                                            )
                                                                        ) ?></h5>
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 sampai">tiba <?= date(
                                                                                'h:i A',
                                                                                strtotime($kendaraan['landing'])
                                                                            ) ?></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="note">
                <div class="judul">
                    <h6>NOTE</h6>
                    <ul>
                        <li>
                            semua waktu yang tertera adalah waktu setempat
                        </li>
                        <li>
                            mohon lakukan check-in <b>1 jam</b> sebelum berangkat
                        </li>
                    </ul>
                </div>
            </div>

            <div class="detailpenumpang">

                <?php if ($kendaraan['status'] === "0") : ?>
                    <div class="alert alert-warning" role="alert">
                        Silahkan melakukan pembayaran terlebih dahulu
                    </div>

                    <form action="<?= base_url() ?>/Tampilan/hapusTiket/<?= $kendaraan['kode_pesan'] ?>" method="post">
                        <div class="card-body media align-items-center" style="margin-bottom: 10% ; margin-left: -10%;margin-right: -3%;">
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-secondary form-control">
                                    batalkan Pesanan
                                    <input type="text" id="hapusTiket" class="account-settings-fileinput" name="button">
                                </label> &nbsp;
                            </div>
                        </div>
                    </form>

                    <nav class="navbar navbar-light mobile bayar bg-white shadow-lg navbar-expand fixed-bottom">
                        <div class="container">
                            <a class="navbar-brand">IDR <?= number_format($kendaraan['total_bayar']) ?></a>
                        </div>
                        <a href="<?= base_url() ?>/Tampilan/pembayaran/<?= $kendaraan['kode_pesan'] ?>" class=" btn btn-info form-control">Bayar Sekarang</a>
                    </nav>

                <?php elseif ($kendaraan['status'] === "1") : ?>
                    <div class="alert alert-info" role="alert">
                        sedang Proses Verifikasi oleh admin
                    </div>
                <?php else : ?>
                    <div class="judul">
                        <h5>DETAIL PENUMPANG</h5>
                    </div>
                    <div class="penumpang">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nama penumpang</th>
                                    <th scope="col">jam check in</th>
                                    <th scope="col">kode kursi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($myKursi as $data) : ?>
                                    <tr>
                                        <td><?= $data['kodeIkut'] ?></td>
                                        <td><?= $data['nama_lengkap'] ?></td>
                                        <td><?= date(
                                                'H:I A',
                                                strtotime($kendaraan['jam_cek_in'])
                                            ) ?></td>
                                        <td><?= $data['kode_kursi_ku'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </div>



</div>


<div class="px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/tiket">
                <i class="fa fa-chevron-left mr-4"></i>MY TIKET
            </a>
        </div>
    </nav>



    <div class="container">
        <div class="rutePerjalan">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h5>berangkat dari</h5>
                        <h6>
                            <?= $kendaraan['rute_awal'] ?>
                        </h6>
                    </div>
                    <div class="col-6">
                        <h5>pergi ke</h5>
                        <h6>
                            <?= $kendaraan['rute_akhir'] ?>
                        </h6>
                    </div>
                </div>
            </div>

        </div>

        <div class="detailPerjalanan">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>
                            Berangkat dari
                        </h5>
                        <p>
                            <?= $kendaraan['rute_awal'] ?> - <?= date(
                                                                    'h:i A',
                                                                    strtotime($kendaraan['takeOff'])
                                                                ) ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 class="judulkedua">
                            Tiba di
                        </h5>
                        <p class="rute">
                            <?= $kendaraan['rute_akhir'] ?> - <?= date(
                                                                    'h:i A',
                                                                    strtotime($kendaraan['landing'])
                                                                ) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="kodeBooking">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="judulkedua">
                            kode booking
                        </h5>
                        <p class="rute">
                            <?= $kendaraan['kode_pesan'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="note mt-5">
            <div class="container">
                <div class="judul">
                    <h6>NOTE</h6>
                    <ul>
                        <li>
                            semua waktu yang tertera adalah waktu setempat
                        </li>
                        <li>
                            mohon lakukan check-in <b>1 jam</b> sebelum berangkat
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="detailYangIkut">
            <div class="container">
                <?php if ($kendaraan['status'] === "0") : ?>
                    <div class="alert alert-warning" role="alert">
                        Silahkan melakukan pembayaran terlebih dahulu
                    </div>

                    <form action="<?= base_url() ?>/Tampilan/hapusTiket/<?= $kendaraan['kode_pesan'] ?>" method="post">
                        <div class="card-body media align-items-center" style="margin-bottom: 40% ; margin-left: -10%;margin-right: -3%;">
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-secondary form-control">
                                    batalkan Pesanan
                                    <input type="text" id="hapusTiket" class="account-settings-fileinput" name="button">
                                </label> &nbsp;
                            </div>
                        </div>
                    </form>


                <?php elseif ($kendaraan['status'] === "1") : ?>
                    <div class="alert alert-info" role="alert">
                        sedang Proses Verifikasi oleh admin
                    </div>
                <?php else : ?>
                    <div class="judul">
                        <h5>
                            DETAIL PENUMPANG
                        </h5>
                    </div>

                    <ul class="list-unstyled">
                        <?php foreach ($myKursi as $data) : ?>
                            <a class="myclass" data-toggle="modal" data-target="#detailpesanan<?= $data['id_kursi'] ?>">
                                <li class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><?= $data['nama_lengkap'] ?></h6>
                                        hai <?= $data['nama_lengkap'] ?> berikut adalah detail tiket anda silahkan klik disini
                                    </div>
                                </li>
                            </a>

                            <div class="modal fade" id="detailpesanan<?= $data['id_kursi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Detail tiket</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">jam check in</th>
                                                        <th scope="col">kode kursi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= date(
                                                                'H:I A',
                                                                strtotime(
                                                                    $kendaraan['jam_cek_in']
                                                                )
                                                            ) ?></td>
                                                        <td><?= $data['kode_kursi_ku'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>



            </div>
        </div>
    </div>
</div>


<?php if ((int) $kendaraan['status'] === 0) : ?>
    <nav class="navbar navbar-light mobile bayar bg-white shadow-lg navbar-expand fixed-bottom      d-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <a class="navbar-brand">IDR <?= number_format($kendaraan['total_bayar']) ?></a>
        </div>
        <a href="<?= base_url() ?>/Tampilan/pembayaran/<?= $kendaraan['kode_pesan'] ?>" class=" btn btn-info form-control">Bayar Sekarang</a>
    </nav>
<?php elseif ((int) $kendaraan['status'] === 1) : ?>
    <?= $this->include('Template/navbarbawah') ?>
<?php else : ?>
    <?= $this->include('Template/navbarbawah') ?>
<?php endif; ?>

<?= $this->endSection() ?>