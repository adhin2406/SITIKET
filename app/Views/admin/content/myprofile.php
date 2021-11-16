<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>

<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="errors" id="errors" data-errors="<?= session()->getFlashdata('error'); ?>"></div>

<div class="container light-style flex-grow-1 container-p-y">

    <div class="overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Password reset</a>
                    <a href="<?= base_url() ?>/Auth/logout1" class="list-group-item list-group-item-action" id="logout">Log out</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <form action="<?= base_url() ?>/Admin/SystemAkun/<?= $penumpang['id_petugas'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                    <div class="allowfile small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
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
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' :  ''; ?>" name="nama_lengkap" value="<?= (old('nama_lengkap') ? old('nama_lengkap') : $penumpang['nama_petugas']) ?>" placeholder="nama lengkap">
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
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' :  ''; ?>" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="alamat"><?= (old('alamat') ? old('alamat') : $penumpang['alamat_petugas'])  ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">tanggal lahir</label>
                                            <input type="date" class="form-control <?= ($validation->hasError('tanggalLahir')) ? 'is-invalid' :  ''; ?>" name="tanggalLahir" value="<?= (old('tanggalLahir') ? old('tanggalLahir') : $penumpang['TTL']) ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggalLahir'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">jenis kelamin</label>

                                            <?php if (session()->get('jenis_kelamin')) : ?>
                                                <select class="form-control <?= ($validation->hasError('jenisKelamin')) ? 'is-invalid' :  ''; ?>" id="exampleFormControlSelect1" name="jenisKelamin">
                                                    <option><?= (old('jenisKelamin') ? old('jenisKelamin') : $penumpang['jenis_kelamin']) ?></option>
                                                    <option>perempuan</option>
                                                </select>
                                            <?php else : ?>
                                                <select class="form-control <?= ($validation->hasError('jenisKelamin')) ? 'is-invalid' :  ''; ?>" id="exampleFormControlSelect1" name="jenisKelamin">
                                                    <option><?= (old('jenisKelamin') ? old('jenisKelamin') : $penumpang['jenis_kelamin']) ?></option>
                                                    <option>laki-laki</option>
                                                    <option>perempuan</option>
                                                </select>
                                            <?php endif; ?>


                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenisKelamin'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">telephone</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('nomer')) ? 'is-invalid' :  ''; ?>" name="nomer" value="<?= (old('nomer') ? old('nomer') : $penumpang['nomerhp']) ?>">
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

                            <form action="<?= base_url(); ?>/Admin/updatedPassword/<?= session()->get('id'); ?>" method="POST" autocomplete="off">
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
                </div>
            </div>
        </div>
    </div>


</div>

<?= $this->endSection() ?>