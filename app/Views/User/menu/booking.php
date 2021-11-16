<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>

<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="errors" id="errors" data-errors="<?= session()->getFlashdata('error'); ?>"></div>

<div class="pcversion1 px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/hasilcariku">
                <i class="fa fa-chevron-left"></i> Detail Pesawat
            </a>
        </div>
    </nav>


    <div class="detailPesawat">
        <div class="col-10 mx-0">
            <div class="judul">
                <div class="container">
                    <h5>
                        Penerbangan dari <?= $kendaraan['rute_awal'] ?> ke <?= $kendaraan['rute_akhir'] ?>
                    </h5>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <?php if (session()->get('kendaraan') === "pesawat") : ?>
                        <i class="fas fa-plane-departure pesawat"></i> <?= $kendaraan['rute_awal'] ?> <i class="fas fa-long-arrow-alt-right arah"></i> <?= $kendaraan['rute_akhir'] ?> <small><span>|</span> <?= date("l d M Y", strtotime($kendaraan['tanggal_berangkat'])) ?></small>
                    <?php elseif (session()->get('kendaraan') === "kereta api") : ?>
                        <i class="fas fa-train pesawat"></i> <?= $kendaraan['rute_awal'] ?> <i class="fas fa-long-arrow-alt-right arah"></i> <?= $kendaraan['rute_akhir'] ?> <small><span>|</span> <?= date("l d M Y", strtotime($kendaraan['tanggal_berangkat'])) ?></small>
                    <?php endif; ?>

                </div>
            </div>

            <div class="harga">
                <div class="container">
                    <h6>Rp <?= number_format($kendaraan['harga']) ?>/pax</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="lebihdetail">
        <div class="container">
            <div class="row">
                <div class="col-7 mx-0 mr-5">
                    <h6><?= $kendaraan['transportasi'] ?></h6>
                    <h4 class="d-flex">
                        <p>
                            <?= date('h:i A', strtotime($kendaraan['takeOff'])); ?>
                        </p>
                        <p class="ml-5">
                            <?= date('h:i A', strtotime($kendaraan['landing'])) ?>
                        </p>
                    </h4>
                    <span class="d-flex">
                        <p>
                            <?= $kendaraan['rute_awal'] ?>
                        </p>
                        <p style="margin-left: 13%;">
                            <?= $kendaraan['rute_akhir'] ?>
                        </p>
                    </span>
                </div>
                <div class="col-4 mx-0">
                    <h6>harga</h6>
                    <div class="container">
                        <a class="navbar-brand">IDR <?= number_format($total) ?></a>
                    </div>
                    <form action="<?= base_url() ?>/Tampilan/pesanan" method="post" autocomplete="off">
                        <input type="hidden" name="id_rute" value="<?= $kendaraan['id_rute'] ?>">
                        <input type="hidden" name="jumlahPenumpang" value="<?= $jumlahPenumpang ?>">
                        <input type="hidden" name="tanggalBerangkat" value="<?= $kendaraan['tanggal_berangkat'] ?>">
                        <input type="hidden" name="totalbayar" value="<?= $total ?>">
                        <input type="hidden" name="jamBerangkat" value="<?= $kendaraan['takeOff'] ?>">
                        <input type="hidden" name="kodeIkut" value="<?= $kendaraan['mykode'] ?>">
                        <input type="hidden" name="tujuan" value="<?= $kendaraan['rute_akhir'] ?>">
                        <button type="submit" name="bayar" class="btn btn-primary form-control">lanjut bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="detaillagi">
        <div class="container">
            <div class="col-7 mx-0">
                <h4>
                    Jumlah penumpang yang ikut
                </h4>
                <?php if ($kendaraan1) : ?>
                    <a href="" class="btn tambahPenumpang form-control" data-toggle="modal" data-target="#tambahPenumpang1"><?= $kendaraan1['orangtua'] ?> orang tua, <?= $kendaraan1['anak-anak'] ?> anak-anak <i class="fas fa-plus"></i> </a>
                <?php else : ?>
                    <a href="" class="btn tambahPenumpang form-control" data-toggle="modal" data-target="#tambahPenumpang1">0 orang tua, 0 anak-anak <i class="fas fa-plus"></i> </a>
                <?php endif; ?>

                <div class="modal fade" id="tambahPenumpang1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="orangtua">
                                    <div class="judul d-flex">
                                        <img src="<?= base_url() ?>/img/icon/ortu.svg " alt="">
                                        <h4>
                                            orang tua
                                        </h4>
                                    </div>
                                    <div class="col-4 d-flex float-right tambah data">
                                        <button type="button" class="btn btn-sm" id="kurang" style="background-color: #eaeaef; color: white;">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                        <?php if ($kendaraan1) : ?>
                                            <span class="mx-2" id="angka"><?= $kendaraan1['orangtua'] ?></span>
                                        <?php else : ?>
                                            <span class="mx-2" id="angka">1</span>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-sm" id="tambah" style="background-color: #1ABC9C; color: white;">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="orangtua mt-3 mb-3">
                                    <div class="judul d-flex">
                                        <img src="<?= base_url() ?>/img/icon/anak.svg " alt="">
                                        <h4>
                                            anak-anak
                                        </h4>
                                    </div>
                                    <div class="col-4 d-flex float-right tambah data">
                                        <button type="button" class="btn btn-sm" id="kurang1" style="background-color: #eaeaef; color: white;">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                        <?php if ($kendaraan1) : ?>
                                            <span class="mx-2" id="angka1"><?= $kendaraan1['anak-anak'] ?></span>
                                        <?php else : ?>
                                            <span class="mx-2" id="angka1">0</span>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-sm" id="tambah1" style="background-color: #1ABC9C; color: white;">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <form action="<?= base_url() ?>/Tampilan/Pesan" method="post" autocomplete="off">
                                    <input type="hidden" name="orangtua" id="ortu">
                                    <input type="hidden" name="anak" id="anak">
                                    <input type="hidden" name="tambah" id="tambah">
                                    <input type="hidden" name="kode" value="<?= $kendaraan['mykode'] ?>">
                                    <button type="submit" class="btn btn-primary">done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php if ($validation->hasError('nama_lengkap')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->getError('nama_lengkap'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->hasError('titel')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->getError('titel'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($kendaraan1 != null) : ?>
                    <!-- cek apakah kode kursi sudah diinput -->
                    <?php if ($kode_kursi) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($kode_kursi as $data) : ?>
                            <a class="btn tambahPenumpang2 btn-secondary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang<?= $data['kode_kursi_ku'] ?>">
                                <div class="container d-flex">
                                    <?= $data['nama_lengkap'] ?>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang<?= $data['kode_kursi_ku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">nama penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/SystemUpdate/<?= $data['id_kursi'] ?>" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap" value="<?= $data['nama_lengkap'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option><?= $data['titel'] ?></option>
                                                        <option>tuan</option>
                                                        <option>nyonya</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php for ($i = $mydata; $i < $jumlahPenumpang; $i++) : ?>
                            <a class="btn tambahPenumpang2 btn-primary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang3">
                                <div class="container d-flex">
                                    penumpang <?= $i ?>
                                    <div class="ubah">
                                        <i class="fas fa-pencil-alt "></i>
                                    </div>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/System" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option value="" disabled selected>title</option>
                                                        <option>tuan</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <?php $no++ ?>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= $jumlahPenumpang; $i++) : ?>
                            <a class="btn tambahPenumpang2 btn-primary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang3">
                                <div class="container d-flex">
                                    penumpang <?= $i ?>
                                    <div class="ubah">
                                        <i class="fas fa-pencil-alt "></i>
                                    </div>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/System" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option value="" disabled selected>title</option>
                                                        <option>tuan</option>
                                                        <option>nyonya</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif ?>
                <?php else :  ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>


<div class=" px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/hasilcariku">
                <i class="fa fa-chevron-left"></i> Detail <?= session()->get('kendaraan') ?>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="kendaraan">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (session()->get('kendaraan') === "pesawat") : ?>
                                <small class="text-muted"><i class="fas fa-plane-departure pesawat"></i><?= $kendaraan['rute_awal'] ?> <i class="fas fa-long-arrow-alt-right"></i> <?= $kendaraan['rute_akhir'] ?></small>
                            <?php elseif (session()->get('kendaraan') === "kereta api") : ?>
                                <small class="text-muted"><i class="fas fa-train pesawat"></i><?= $kendaraan['rute_awal'] ?> <i class="fas fa-long-arrow-alt-right"></i> <?= $kendaraan['rute_akhir'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h6><?= date("l d M Y", strtotime($kendaraan['tanggal_berangkat'])) ?></h6>
                            <h5><?= $kendaraan['transportasi'] ?></h5>
                            <span>
                                <?= date('h:i a', strtotime($kendaraan['takeOff'])); ?> <i class="fas fa-long-arrow-alt-right"></i> <?= date('h:i a', strtotime($kendaraan['landing'])) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12">
                <?php if ($kendaraan1) : ?>
                    <a href="" class="btn tambahPenumpang form-control" data-toggle="modal" data-target="#tambahPenumpang"><?= $kendaraan1['orangtua'] ?> orang tua, <?= $kendaraan1['anak-anak'] ?> anak-anak <i class="fas fa-plus"></i> </a>

                <?php else : ?>
                    <a href="" class="btn tambahPenumpang form-control" data-toggle="modal" data-target="#tambahPenumpang">0 orang tua, 0 anak-anak <i class="fas fa-plus"></i> </a>
                <?php endif; ?>


                <div class="modal fade" id="tambahPenumpang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="orangtua">
                                    <div class="judul d-flex">
                                        <img src="<?= base_url() ?>/img/icon/ortu.svg " alt="">
                                        <h4>
                                            orang tua
                                        </h4>
                                    </div>
                                    <div class="col-4 d-flex float-right tambah data">
                                        <button type="button" class="btn btn-sm" id="kurang5" style="background-color: #eaeaef; color: white;">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                        <?php if ($kendaraan1) : ?>
                                            <span class="mx-2" id="angka5"><?= $kendaraan1['orangtua'] ?></span>
                                        <?php else : ?>
                                            <span class="mx-2" id="angka5">1</span>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-sm" id="tambah5" style="background-color: #1ABC9C; color: white;">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="orangtua mt-3 mb-3">
                                    <div class="judul d-flex">
                                        <img src="<?= base_url() ?>/img/icon/anak.svg " alt="">
                                        <h4>
                                            anak-anak
                                        </h4>
                                    </div>
                                    <div class="col-4 d-flex float-right tambah data">
                                        <button type="button" class="btn btn-sm" id="kurang6" style="background-color: #eaeaef; color: white;">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                        <?php if ($kendaraan1) : ?>
                                            <span class="mx-2" id="angka6"><?= $kendaraan1['anak-anak'] ?></span>
                                        <?php else : ?>
                                            <span class="mx-2" id="angka6">0</span>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-sm" id="tambah6" style="background-color: #1ABC9C; color: white;">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <form action="<?= base_url() ?>/Tampilan/Pesan" method="post" autocomplete="off">
                                    <input type="hidden" name="orangtua" id="ortu1">
                                    <input type="hidden" name="anak" id="anak1">
                                    <input type="hidden" name="tambah" id="tambah">
                                    <input type="hidden" name="kode" value="<?= $kendaraan['mykode'] ?>">
                                    <button type="submit" class="btn btn-primary">done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="book">
            <div class="col-12">
                <?php if ($validation->hasError('nama_lengkap')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->getError('nama_lengkap'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->hasError('titel')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->getError('titel'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($kendaraan1 != null) : ?>
                    <!-- cek apakah kode kursi sudah diinput -->
                    <?php if ($kode_kursi) : ?>
                        <?php foreach ($kode_kursi as $data) : ?>
                            <a class="btn tambahPenumpang2 btn-secondary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang<?= $data['id_kursi'] ?>">
                                <div class="container d-flex">
                                    <?= $data['nama_lengkap'] ?>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang<?= $data['id_kursi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">nama penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/SystemUpdate/<?= $data['id_kursi'] ?>" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap" value="<?= $data['nama_lengkap'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option><?= $data['titel'] ?></option>
                                                        <option>tuan</option>
                                                        <option>nyonya</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php for ($i = $mydata; $i < $jumlahPenumpang; $i++) : ?>
                            <a class="btn tambahPenumpang2 btn-primary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang6">
                                <div class="container d-flex">
                                    penumpang <?= $i ?>
                                    <div class="ubah">
                                        <i class="fas fa-pencil-alt "></i>
                                    </div>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/System" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option value="" disabled selected>title</option>
                                                        <option>tuan</option>
                                                        <option>nyonya</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= $jumlahPenumpang; $i++) : ?>
                            <a class="btn tambahPenumpang2 btn-primary mb-3 form-control" data-toggle="modal" data-target="#tambahPenumpang4">
                                <div class="container d-flex">
                                    penumpang <?= $i ?>
                                    <div class="ubah">
                                        <i class="fas fa-pencil-alt "></i>
                                    </div>
                                </div>
                            </a>

                            <div class="modal fade" id="tambahPenumpang4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumlah Penumpang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" action="<?= base_url() ?>/Tampilan/System" method="POST">
                                                <input type="hidden" name="mykode" value="<?= $kendaraan['mykode'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="nama lengkap">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="titel">
                                                        <option value="" disabled selected>title</option>
                                                        <option>tuan</option>
                                                        <option>Nona</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif ?>
                <?php else :  ?>
                <?php endif; ?>
            </div>
        </div>
    </div>



    <nav class="navbar navbar-light mobile bayar bg-white shadow-lg navbar-expand fixed-bottom d-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <a class="navbar-brand">IDR <?= number_format($total) ?></a>
        </div>
        <form action="<?= base_url() ?>/Tampilan/pesanan" method="post" autocomplete="off">
            <input type="hidden" name="id_rute" value="<?= $kendaraan['id_rute'] ?>">
            <input type="hidden" name="jumlahPenumpang" value="<?= $jumlahPenumpang ?>">
            <input type="hidden" name="tanggalBerangkat" value="<?= $kendaraan['tanggal_berangkat'] ?>">
            <input type="hidden" name="totalbayar" value="<?= $total ?>">
            <input type="hidden" name="jamBerangkat" value="<?= $kendaraan['takeOff'] ?>">
            <input type="hidden" name="kodeIkut" value="<?= $kendaraan['mykode'] ?>">
            <input type="hidden" name="tujuan" value="<?= $kendaraan['rute_akhir'] ?>">
            <button type="submit" class="btn btn-primary form-control">lanjut bayar</button>
        </form>
    </nav>
</div>
<?= $this->endSection() ?>