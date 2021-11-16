<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="container">


        <div class="mytiket">
            <div class="detailpenumpang">
                <div class="judul">
                    <h5>BUKTI PEMBAYARAAN</h5>
                    <img src="<?= base_url() ?>/img/headermenu/<?= $kendaraan['buktiBayar'] ?>" alt="">
                </div>
            </div>
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
                                        <h5 class="mt-0 mb-1 kode_booking">Kode booking</h5>
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
                                        <h5 class="mt-0 mb-1 kode_pesan"><?= $kendaraan['kode_pesan'] ?></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><?= $kendaraan['rute_awal'] ?>/<?= $kendaraan['rute_akhir'] ?></h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 berangkat">berangkat <?= date('h:i A', strtotime($kendaraan['takeOff'])); ?></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul class="list-unstyled mydetail">
                                <li class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 tanggal"><?= date("d M Y", strtotime($kendaraan['tanggal_berangkat'])) ?></h5>
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
                                        <h5 class="mt-0 mb-1 sampai">tiba <?= date('h:i A', strtotime($kendaraan['landing'])); ?></h5>
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
                <div class="judul">
                    <h5>DETAIL PENUMPANG</h5>
                </div>
                <div class="penumpang ">
                    <table class="table mb-5">
                        <thead>
                            <tr>
                                <th scope="col">nama penumpang</th>
                                <th scope="col">jam check in</th>
                                <th scope="col">kode kursi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($myKursi as $data) : ?>
                                <tr>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td><?= date("H:I A", strtotime($kendaraan['jam_cek_in'])) ?></td>
                                    <td><?= $data['kode_kursi_ku'] ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>


<?= $this->endSection() ?>