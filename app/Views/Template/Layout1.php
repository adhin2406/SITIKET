<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="<?= base_url() ?>/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/Utama.css">

    <link rel="shortcut icon" href="<?= base_url() ?>/img/icon/logo.png">
    <title><?= $title ?></title>
</head>

<body>


    <?= $this->renderSection('content') ?>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>/js/jquerysession .js"></script>
    <!-- <script src="<?= base_url() ?>/js/session.js"></script> -->
    <script src="<?= base_url() ?>/js/typed.min.js"></script>
    <script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/main.js"></script>
    <script>
        $('.readMore').click(function(e) {
            e.preventDefault();
            var collapse_content_selector = $(this).attr('href');
            var toggle_switch = $(this);
            $(collapse_content_selector).toggle(function() {
                if ($(this).css('display') == 'none') {
                    toggle_switch.html('Read More');
                } else {
                    toggle_switch.html('Read Less');
                }
            });
        });
        <?php foreach ($kendaraan as $data) : ?>
            $("#tunggu<?= $data['kode_pesan'] ?>").on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'info',
                    title: 'harap bersabar',
                    text: 'Saat ini tiket sedang dalam proses verifikasi',
                })
            });

            $("#tunggu<?= $data['id_pesan'] ?>").on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'info',
                    title: 'harap bersabar',
                    text: 'Saat ini tiket sedang dalam proses verifikasi',
                })
            });
        <?php endforeach; ?>
    </script>
</body>

</html>