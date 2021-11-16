<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>


<div class="pcversion1 px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/detailtiket/<?= $total['kode_pesan'] ?>">
                <i class="fa fa-chevron-left mr-4"></i>Bayar Now
            </a>
        </div>
    </nav>


    <div class="tiketYangDiChekout">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="border mb-4">
                        <section class="date">
                            <time datetime="23th feb">
                                <span><?= date("d M", strtotime($total['tanggal_berangkat'])) ?></span>
                            </time>
                        </section>
                        <section class="card-cont tiketing">
                            <h3><?= $total['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $total['rute_akhir'] ?></h3>
                            <div class="even-date">
                                <h3>
                                    <?= date('h:i A', strtotime($total['takeOff'])) ?>
                                </h3>
                            </div>
                            <div class="even-info">
                                <p>
                                    Rp <?= number_format($total['total_bayar']) ?>
                                </p>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="col-6">
                    <div class="metodePembayaran">
                        <div class="container">
                            <div class="accordion" id="accordionExample">
                                <div class="item">
                                    <div class="item-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Paypal
                                                <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="t-p">
                                            <ul class="list-group">
                                                <li class="list-group">
                                                    kamu bisa join menjadi anggota sitiket dengan melakukan pendaftaran di
                                                    <a href="<?= base_url() ?>/Auth/Join">cek disini
                                                    </a>
                                                </li>
                                                <li class="list-group">
                                                    2. untuk menjadi petugas dan juga administrator kamu perlu menyiapkan beberapa file seperti ktp,ijasah sekolah terakhir dan masih banyak lagi tenang data anda dijamin keamananya karena sudah terenkripsi saat anda menginputkan datanya jadi kami pun tidak mengetahunya
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Credit card
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30"> <img src="https://i.imgur.com/W1vtnOV.png" width="30"> <img src="https://i.imgur.com/35tC99g.png" width="30"> <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="t-p">
                                            <ul class="list-group">
                                                <li class="list-group">
                                                    anda dapat memesan tiket di sitiket dengan mengklik menu di halaman home kami atau <a href="">klik disini</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" id="TotalBayar">
                        <a class="navbar-brand totalYangDibayar">Total Rp <?= number_format($total['total_bayar']) ?></a> <br>
                        <a class="btn btn-primary form-control" data-toggle="modal" data-target="#bayarSekarang">Bayar Now</a>
                        <div class="modal fade" id="bayarSekarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaraan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="uploadGambar">
                                            <div class="container">
                                                <form action="<?= base_url() ?>/Tampilan/chekout/<?= $total['id_pesan'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="mt-5">
                                                    <?= csrf_field(); ?>
                                                    <div class="form-group">
                                                        <div class="media-body ml-4">
                                                            <label class="btn btn-outline-primary form-control" id="labelUploadGambar">
                                                                Upload new photo
                                                                <input type="file" class="account-settings-fileinput <?= ($validation->hasError('gambar')) ? 'is-invalid' :  ''; ?>" id="gambar" name="gambar" onchange="previewGambar()">
                                                                <div class="invalid-feedback">
                                                                    <p><?= $validation->getError('gambar'); ?> </p>
                                                                </div>
                                                            </label> &nbsp;
                                                        </div>
                                                        <img src="<?= base_url() ?>/img/users/" alt="" class="d-block ui-w-80" id="gambarPreview">
                                                    </div>

                                                    <button type="submit" class="form-control btn btn-success mt-2">Done</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


<div class="px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/detailtiket/<?= $total['kode_pesan'] ?>">
                <i class="fa fa-chevron-left mr-4"></i>Bayar Now
            </a>
        </div>
    </nav>

    <div class="tiketYangChekout">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <a>
                        <article class="card fl-left">
                            <section class="date">
                                <time datetime="23th feb">
                                    <span><?= date("d M", strtotime($total['tanggal_berangkat'])) ?></span>
                                </time>
                            </section>
                            <section class="card-cont">
                                <h3><?= $total['rute_awal'] ?> <i class="fas fa-exchange-alt panah"></i> <?= $total['rute_akhir'] ?> </h3>

                                <div class="even-date">
                                    <h3>
                                        <?= date('h:i A', strtotime($total['takeOff'])) ?>
                                    </h3>
                                </div>
                            </section>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="metodePembayaran">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="item">
                    <div class="item-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Paypal
                                <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="t-p">
                            <ul class="list-group">
                                <li class="list-group">
                                    kamu bisa join menjadi anggota sitiket dengan melakukan pendaftaran di
                                    <a href="<?= base_url() ?>/Auth/Join">cek disini
                                    </a>
                                </li>
                                <li class="list-group">
                                    2. untuk menjadi petugas dan juga administrator kamu perlu menyiapkan beberapa file seperti ktp,ijasah sekolah terakhir dan masih banyak lagi tenang data anda dijamin keamananya karena sudah terenkripsi saat anda menginputkan datanya jadi kami pun tidak mengetahunya
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Credit card
                                <img src="https://i.imgur.com/2ISgYja.png" width="30"> <img src="https://i.imgur.com/W1vtnOV.png" width="30"> <img src="https://i.imgur.com/35tC99g.png" width="30"> <img src="https://i.imgur.com/2ISgYja.png" width="30">
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="t-p">
                            <ul class="list-group">
                                <li class="list-group">
                                    anda dapat memesan tiket di sitiket dengan mengklik menu di halaman home kami atau <a href="">klik disini</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="TotalBayar">
        <a class="navbar-brand totalYangDibayar">Total Rp <?= number_format($total['total_bayar']) ?></a> <br>
        <a class="btn btn-primary form-control" data-toggle="modal" data-target="#bayarNow">Bayar Now</a>
        <div class="modal fade" id="bayarNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaraan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="uploadGambar">
                            <div class="container">
                                <form action="<?= base_url() ?>/Tampilan/chekout/<?= $total['id_pesan'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="mt-5">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary form-control" id="labelUploadGambar">
                                                Upload new photo
                                                <input type="file" class="account-settings-fileinput <?= ($validation->hasError('gambar')) ? 'is-invalid' :  ''; ?>" id="gambarYangDipilih" name="gambar" onchange="tampilGambar()">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('gambar'); ?>
                                                </div>
                                            </label> &nbsp;
                                        </div>
                                        <img src="<?= base_url() ?>/img/users/" alt="" class="d-block ui-w-80" id="TampilGambar">
                                    </div>

                                    <button type="submit" class="form-control btn btn-success">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>