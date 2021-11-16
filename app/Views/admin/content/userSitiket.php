<?= $this->extend('Template/admin/Template') ?>

<?= $this->section('content') ?>
<div class="flashdata" id="flashData" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    <a href="<?= base_url() ?>/JoinFamilly" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Petugas</a>
</div>



<div class="container mt-5">
    <div class="row">
        <?php foreach ($user as $data) : ?>
            <div class="col-md-3">
                <a href="<?= base_url() ?>/Admin/DetailUser/<?= $data['slug'] ?>" class="btn">
                    <div class="bg-white p-3 text-center rounded box"><img class="img-responsive rounded-circle" src="<?= base_url() ?>/img/users/<?= $data['gambar'] ?>" width="90">
                        <h5 class="mt-3 name"><?= $data['username'] ?></h5>
                        <div class="mt-4 about"><span>is a long established fact that eader&nbsp; will be distracted by the readable content.</span></div>
                        <div class="mt-4">
                            <h6 class="v-profile">View Profile</h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endsection() ?>