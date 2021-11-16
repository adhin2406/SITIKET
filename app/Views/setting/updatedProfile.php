<?= $this->extend('Template/Layout') ?>

<?= $this->section('content') ?>
<div class="ubahakun px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>/Tampilan/setting">Kembali</a>
        </div>
    </nav>
    <div class="container">
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
                    <button class="btn btn-primary form-control" type="submit">
                        Ubah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->include('Template/navbarbawah') ?>

<?= $this->endsection() ?>