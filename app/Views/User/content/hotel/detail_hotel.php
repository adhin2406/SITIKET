<?= $this->extend('Template/Layout1') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>


<div class="pcversion1 px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left mr-3"></i>KEMBALI
            </a>
        </div>
    </nav>

</div>


<div class="mobileApp mobile px-0 d-lg-none" style="height: max-content;">

    <nav class="navbar navbar-light shadow-lg navbar-expand fixed-top d-none" id="navbarAtas">
        <div class="container navbarBrand">
            <a class="navbar-brand" href="#"><i class="fa fa-chevron-left mr-3"></i> hotel bintang 5 </a>
        </div>


        <div class="d-flex">
            <div id="menuDetialHotel" class="container owl-carousel d-flex">
                <div class="container">
                    <ul class="list-inline owl-carousel nameHotel">
                        <a href="" class="list-inline-item">
                            <li id="infoUmum" class="list-inline-item mr-3 c-point DetailTiketSitiket" style="color: black;">
                                <p>info umum</p>
                            </li>
                        </a>
                        <a href="" class="list-inline-item">
                            <li class="list-inline-item mr-3 c-point DetailTiketSitiket" id="Review" style="color: black;">
                                <p>Review</p>
                            </li>
                        </a>
                        <a href="" class="list-inline-item">
                            <li class="list-inline-item mr-3 c-point DetailTiketSitiket" id="fasilitas" style="color: black;">
                                <p>Fasilitas</p>
                            </li>
                        </a>

                        <a href="" class="list-inline-item">
                            <li class="list-inline-item mr-3 c-point DetailTiketSitiket_kedua" style="color: black;" id="akomoditas">
                                <p>Akomodasi</p>
                            </li>
                        </a>

                        <a href="" class="list-inline-item">
                            <li class="list-inline-item mr-3 c-point DetailTiketSitiket_kedua" id="kamar" style="color: #000;">
                                <p>kamar</p>
                            </li>
                        </a>
                        <a href="" class="list-inline-item">
                            <li class="list-inline-item mr-3 c-point DetailTiketSitiket_kedua" id="lokasi" style="color: #000;">
                                <p>lokasi</p>
                            </li>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <a href="<?= base_url() ?>" class="BackMenu">
        <i class="fas fa-arrow-left"></i>
    </a>


    <div class="PreviewHotel  owl-carousel">
        <img src="<?= base_url() ?>/img/headermenu/hotel_1.jpg" alt="">
        <img src="<?= base_url() ?>/img/headermenu/hotel_2.jpg" alt="">
        <img src="<?= base_url() ?>/img/headermenu/hotel_3.jpg" alt="">
    </div>

    <div class="namaHotel" id="namaHotel">
        <h4>
            Hotel Asri
        </h4>
        <p>
            <i class="fas fa-map-marker-alt mr-2"></i> <span>jln mayjen supraman</span>
        </p>
    </div>


    <div class="DeskripsiSingkatHotel">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui id ducimus. Modi temporibus quisquam, eveniet adipisci atque, molestias,
            <a href="#lanjutan" class="readMore">Read More</a>
        <div id="lanjutan" style="display:none">
            <p>Sed eleifend lectus id semper accumsan. Sed lobortis id ligula eget blandit. Integer interdum iaculis nunc, sed porttitor magna tincidunt in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam lobortis accumsan tempor. Aliquam sollicitudin pulvinar est, quis convallis tellus.</p>
        </div>
        </p>
    </div>


    <div class="review" id="Reviews">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-6">
                            <h5>2.3K Reviews</h5>
                        </div>
                        <div class="col-6">
                            <a href="">lihat semua <i class="fas fa-chevron-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contohReview owl-carousel">
                <div class="card">
                    <div class="container">
                        <div class="header">
                            <img src="<?= base_url() ?>/img/icon/avatar-family.webp" class="float-left">
                            <h5>Adhi nugroho</h5>
                            <p>
                                27 Agt 2020 - Keluarga
                            </p>
                        </div>

                        <p class="reviewne">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, maxime fuga. Eligendi quod iusto dolorem molestias neque distinctio, iste excepturi, commodi perspiciatis nobis, laborum non in! Quod fuga molestias ex!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="container">
                        <div class="header">
                            <img src="<?= base_url() ?>/img/icon/avatar-family.webp" class="float-left">
                            <h5>Adhi nugroho</h5>
                            <p>
                                27 Agt 2020 - Keluarga
                            </p>
                        </div>

                        <p class="reviewne">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, maxime fuga. Eligendi quod iusto dolorem molestias neque distinctio, iste excepturi, commodi perspiciatis nobis, laborum non in! Quod fuga molestias ex!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="container">
                        <div class="header">
                            <img src="<?= base_url() ?>/img/icon/avatar-family.webp" class="float-left">
                            <h5>Adhi nugroho</h5>
                            <p>
                                27 Agt 2020 - Keluarga
                            </p>
                        </div>

                        <p class="reviewne">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, maxime fuga. Eligendi quod iusto dolorem molestias neque distinctio, iste excepturi, commodi perspiciatis nobis, laborum non in! Quod fuga molestias ex!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <nav class="navbar navbar-light lihatKamar shadow-lg navbar-expand fixed-bottom" id="navbarBawah">
        <div class="container">
            <a href="" class="btn btn-primary form-control">lihat kamar</a>
        </div>
    </nav>


</div>


<?= $this->endSection() ?>