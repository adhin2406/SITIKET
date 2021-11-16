<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>

<?= $this->include("Template/navbar") ?>

<section class="slider px-0 d-none d-lg-block" style="height: fit-content;">
    <div class="container">
        <div class="row  sliderutama owl-carousel">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/promo.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</section>

<section class="slider px-0 d-lg-none" style="height: max-content;">
    <div class="container">
        <div class="row  slidekedua owl-carousel">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <img src=" <?= base_url() ?>/img/slider/promo.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <img src="<?= base_url() ?>/img/slider/3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</section>

<!-- menu -->
<div class="menu  px-0 d-none d-lg-block" style="height: fit-content;">
    <div class="container">
        <div class="row  mainmenu owl-carousel">
            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <img src="<?= base_url() ?>/img/menu/all.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">All Menu</h5>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url() ?>/Tampilan/Pesawat" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/pesawat.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">pesawat</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url() ?>/Tampilan/kereta" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/kereta.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">kereta api</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/taxi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">sewa mobil</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/hotel.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Hotel</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/event.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Event</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="menu  px-0 d-lg-none" style="height: max-content;">
    <div class="container">
        <div class="row menumain owl-carousel owl-theme">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url() ?>/Tampilan/Pesawat" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/pesawat.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">pesawat</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url() ?>/Tampilan/kereta" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/kereta.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">kereta api</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/taxi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">sewa mobil</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/hotel.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Hotel</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="" class="btn">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/menu/event.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Event</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>






<section class="fresh  px-0 d-none d-lg-block" style="height: fit-content;">
    <div class="container">
        <div class="judul">
            <h3>Hotel Terbaru di SITIKET</h3>
            <p><a href="">Lihat semua</a></p>
        </div>
        <div class="content ">
            <div class="row kebun owl-carousel">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="<?= base_url() ?>/Tampilan/detailHotel" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/1.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>hotel bintang 5</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/2.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>Nama Produk</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/3.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>Nama Produk</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="fresh   px-0 d-lg-none" style="height: max-content;">
    <div class="container">
        <div class="judul">
            <h3>Hotel Terbaru di SITIKET</h3>
            <p>
                ingin santai sejenak dari rutinitas harian? Yuk, cobain nginep di sini bareng teman dan keluarga
            </p>
        </div>
        <div class="content ">
            <div class="row darikebun owl-carousel">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/1.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>Nama Produk</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/2.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>Nama Produk</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                    <a href="" class="btn">
                        <figure class="figure">
                            <div class="figure-img m-0">
                                <img src="<?= base_url() ?>/img/hotel/3.jpg" class="figure-img img-fluid m-0">
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5>Nama Produk</h5>
                                <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                        550,500</strike></p>
                                <p>IDR 260,900</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="popular  px-0 d-none d-lg-block" style="height: fit-content;">
    <div class="container">
        <div class="judul">
            <h3>Liburan asik bareng SITIKET</h3>
            <p><a href="">Lihat semua</a></p>
        </div>


        <div class="row kebun owl-carousel">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/1.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/2.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/3.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="popular  px-0 d-lg-none" style="height: max-content;">
    <div class="container">
        <div class="judul">
            <h3>Liburan asik bareng SITIKET</h3>
            <p class="caption">
                atraksi seru, diskonya asyik, ayo main ke sini
            </p>
        </div>


        <div class="row darikebun owl-carousel">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/1.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/2.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-12" style="height: fit-content;">
                <a href="" class="btn">
                    <figure class="figure">
                        <div class="figure-img m-0">
                            <img src="<?= base_url() ?>/img/hotel/3.jpg" class="figure-img img-fluid m-0">
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>Nama Produk</h5>
                            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>IDR
                                    550,500</strike></p>
                            <p>IDR 260,900</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </div>
</div>



<?= $this->include('Template/navbarbawah') ?>


<?= $this->endsection() ?>