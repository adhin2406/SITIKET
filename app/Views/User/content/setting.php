<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>


<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="errors" id="errors" data-errors="<?= session()->getFlashdata('error'); ?>"></div>



<div class="pc px-0 d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url() ?>/img/icon/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active mr-3" href="<?= base_url() ?>">Home</a>
                <a class="nav-link mr-3" href="<?= base_url() ?>/Tampilan/tiket">My Order</a>
                <a class="nav-link" href="<?= base_url() ?>/Tampilan/Setting">Setting</a>
            </div>
        </div>
    </nav>

    <div class="container light-style flex-grow-1 container-p-y">
        <div class=" overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Password reset</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Customer Care</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Complaint form</a>
                        <a href="<?= base_url() ?>/Auth/logout" class="list-group-item list-group-item-action" id="logout">Log out</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form action="<?= base_url() ?>/Tampilan/SystemAkun/<?= $penumpang['id_penumpang'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="slug" value="<?= $penumpang['slug'] ?>">
                                <input type="hidden" name="gambarlama" value="<?= $penumpang['gambar'] ?>">
                                <div class="card-body media align-items-center">
                                    <img src="<?= base_url() ?>/img/users/<?= session()->get('gambar') ?>" alt="" class="d-block ui-w-80" id="gambarPreview">
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" class="account-settings-fileinput <?= ($validation->hasError('gambar')) ? 'is-invalid' :  ''; ?>" id="gambar" name="gambar" onchange="previewGambar()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('gambar'); ?>
                                            </div>
                                        </label> &nbsp;
                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" id="disabledInput" name="username" type="text" value="<?= $penumpang['username'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama lengkap</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' :  ''; ?>" name="nama_lengkap" value="<?= (old('nama_lengkap') ? old('nama_lengkap') : $penumpang['nama_penumpang']) ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_lengkap'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control mb-1 <?= ($validation->hasError('email')) ? 'is-invalid' :  ''; ?>" name="email" value="<?= (old('email') ? old('email') : $penumpang['email']) ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">alamat</label>
                                        <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' :  ''; ?>" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="alamat"><?= (old('alamat') ? old('alamat') : $penumpang['alamat_penumpang'])  ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">tanggal lahir</label>
                                                <input type="date" class="form-control <?= ($validation->hasError('tanggalLahir')) ? 'is-invalid' :  ''; ?>" name="tanggalLahir" value="<?= (old('tanggalLahir') ? old('tanggalLahir') : $penumpang['tanggal_lahir']) ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggalLahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">jenis kelamin</label>
                                                <select class="form-control <?= ($validation->hasError('jenisKelamin')) ? 'is-invalid' :  ''; ?>" id="exampleFormControlSelect1" name="jenisKelamin">
                                                    <option><?= (old('jenisKelamin') ? old('jenisKelamin') : $penumpang['jenis_kelamin']) ?></option>
                                                    <option>laki-laki</option>
                                                    <option>perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jenisKelamin'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">telephone</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('nomer')) ? 'is-invalid' :  ''; ?>" name="nomer" value="<?= (old('nomer') ? old('nomer') : $penumpang['telephone']) ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nomer'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary form-control" name="setting" type="submit">
                                            Ubah
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">

                                <form action="<?= base_url(); ?>/Auth/updatedPassword/<?= session()->get('id'); ?>" method="POST" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="password" class="form-control <?= ($validation->hasError('passwordlama')) ? 'is-invalid' :  ''; ?>" name="passwordlama" placeholder="Enter your old password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('passwordlama'); ?>
                                        </div>
                                        <input type="password" class="form-control mt-1 <?= ($validation->hasError('passwordbaru')) ? 'is-invalid' :  ''; ?>" name="passwordbaru" placeholder="New password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('passwordbaru'); ?>
                                        </div>
                                        <input type="password" class="form-control mt-1 <?= ($validation->hasError('konfirmasi')) ? 'is-invalid' :  ''; ?>" name="konfirmasi" placeholder="Confirm new password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('konfirmasi'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update password</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">

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
                                                        Website terima beres langsung jadi dan sudah termasuk domain, hosting bahkan setelah
                                                        website anda sudah sepenuhnya kami kerjakan sesuai materi yang dikirimkan, tim kami
                                                        juga mengirimkan semua akses via email dengan subjek yang terdiri dari :
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Apakah sudah termasuk Domain dan Hosting ?
                                                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="t-p">
                                                Iya sudah termasuk domain, hosting, email address dengan nama domain sendiri, desain logo,
                                                banner dan input materi website (memasukan tulisan dan gambar-gambar ke website anda),
                                                optimasi SEO Basic, desain webiste template premium, fitur website lengkap dan gratis
                                                maintenence.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Apakah Arunika Technology menerima jasa desain website saja ?
                                                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                            <div class="t-p">
                                                Arunika Technology tidak hanya melayani jasa pembuatan website, kami juga menyediakan jasa
                                                desain
                                                website saja yang sudah di lengkapi fitur sesuai kebutuhan Anda, seperti Search Engine
                                                Optimization (SEO) basic ini membantu calon customer Anda mudah menemukan website usaha atau
                                                bisnis khususnya di Pencarian Google.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">

                                <form action="<?= base_url() ?>/Tampilan/aduan" method="POST" autocomplete="off">
                                    <div class="form-group">
                                        <textarea class="form-control <?= ($validation->hasError('aduan')) ? 'is-invalid' :  ''; ?>" name="aduan" rows="10" placeholder="complaint form"><?= old('aduan') ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('aduan'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- setting akun lainya -->
<div class="lainya px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light setting shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fa fa-chevron-left"></i> Settings
            </a>
        </div>
    </nav>


    <div class="content">
        <div class="judul">
            <div class="container">
                <h6>
                    Account Setting
                </h6>
            </div>
        </div>

        <div class="contentAccount">
            <div class="container">
                <ul class="list-unstyled">
                    <li class="media">
                        <a href="<?= base_url() ?>/profile/<?= session()->get('slug') ?>">
                            <i class="fa fa-user mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Profile</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="judul">
            <div class="container">
                <h6>
                    Security Settings
                </h6>
            </div>
        </div>

        <div class="contentAccount">
            <div class="container">
                <ul class="list-unstyled">
                    <li class="media">
                        <a href="<?= base_url() ?>/Tampilan/updatePassword">
                            <i class="fa fa-lock mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Password reset</h5>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="<?= base_url() ?>/Tampilan/pengaduan">
                            <i class="fas fa-file-excel mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">complaint form</h5>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="<?= base_url() ?>/Auth/logout" id="logout1">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">log out</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>