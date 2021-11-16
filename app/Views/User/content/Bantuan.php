<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>



<div class="mobile px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left"></i> Pusat Bantuan
            </a>
        </div>
    </nav>

    <div class="bantuan">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="item">
                    <div class="item-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Gimana caranya join sitiket??
                                <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
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
                                Gimana caranya pesen tiket di sitiket
                                <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
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
                <div class="item">
                    <div class="item-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Gimana cari mengadukan jika terdapat bug atau error di sitiket
                                <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="t-p">
                            anda dapat mengadukan hal apapun yang berkaitan dengan sitiket di <a href="<?= base_url() ?>/Tampilan/pengaduan">disini</a> atau anda bisa masuk ke halaman settings lalu klik complaint form
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="item-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Gimana cari mengadukan jika terdapat bug atau error di sitiket
                                <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="t-p">
                            anda dapat mengadukan hal apapun yang berkaitan dengan sitiket di <a href="<?= base_url() ?>/Tampilan/pengaduan">disini</a> atau anda bisa masuk ke halaman settings lalu klik complaint form
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>