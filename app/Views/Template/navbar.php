<!-- mobile version -->
<div class="hp px-0 d-lg-none" style="height: max-content;">
    <nav class="navbar  navbar-expand-lg navbar-light shadow  fixed-top">
        <div class="box navbar-brand">
            <h1>SITIKET</h1>
        </div>


        <div class="cart float-right d-flex">
            <?php if ($notif['status']) : ?>
                <a class="Pencarian">
                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </a>


                <a href="<?= base_url() ?>/Tampilan/notif" class="cari">
                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                    <span class="badge angka badge-danger badge-counter"><?= $notif['status'] ?></span>
                </a>
            <?php else : ?>
                <a class="Pencarian1">
                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </a>


                <a href="<?= base_url() ?>/Tampilan/notif" class="cari1">
                    <svg width="2em" height="2em" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</div>


<!-- pc version -->
<div class="px-0 pcversion d-none d-lg-block" style="height: fit-content;">
    <nav class="navbar shadow navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand type-1" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php if (!session()->get('logged_in')) : ?>
                    <a href="<?= base_url() ?>/Auth" class="btn btn-danger">Sign In</a>
                <?php else : ?>
                    <a class="nav-link active mr-3" href="<?= base_url() ?>">Home</a>
                    <a class="nav-link mr-3" href="<?= base_url() ?>/Tampilan/tiket">Order</a>
                    <a class="nav-link mr-3" href="<?= base_url() ?>/Tampilan/Setting">Setting</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>