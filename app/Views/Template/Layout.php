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

    <link href="<?= base_url() ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

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
    <script src="<?= base_url() ?>/assets/vendor/aos/aos.js'"></script>
    <script src="<?= base_url() ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/js.js"></script>
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/main.js"></script>
    <script>
        function formatParams(params) {
            return "?" + Object
                .keys(params)
                .map(function(key) {
                    return key + "=" + encodeURIComponent(params[key])
                })
                .join("&")
        }

        $("#gambar").on("change", function() {
            const tiket = document.getElementById("tiket");
            const url = "<?= base_url()  ?>/Tampilan/SaveGambar";
            const params = {
                gambar: $("#gambar").val()
            }
            const gambarYangdipilih = document.querySelector('#gambar');
            gambarYangdipilih.files[0].name;
            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambarYangdipilih.files[0]);
            fileGambar.onload = function(e) {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        tiket.innerHTML = xhr.responseText;
                    }
                }
                xhr.open('GET', url + uji, true);
                xhr.send();
            }
        })

        const awal = document.getElementById('awal');
        const akhir = document.getElementById('akhir');
        const tiket = document.getElementById('tiket');

        $(awal).on('change', function() {
            const dataAwal = $(awal).val();
            const dataAkhir = $(akhir).val();
            const dataBerangkat = $("#tanggal").val();

            const url = "<?= base_url()  ?>/Tampilan/ajax";
            const params = {
                awal: dataAwal,
                akhir: dataAkhir,
                tanggal: dataBerangkat,
            }

            const uji = formatParams(params);

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    tiket.innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET', url + uji, true);
            xhr.send();
        });

        $(akhir).on('change', function() {
            const dataAwal = $(awal).val();
            const dataAkhir = $(akhir).val();
            const dataBerangkat = $("#tanggal").val();
            const url = "<?= base_url()  ?>/Tampilan/ajax";
            const params = {
                awal: dataAwal,
                akhir: dataAkhir,
                tanggal: dataBerangkat
            }
            const uji = formatParams(params);

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    tiket.innerHTML = xhr.responseText;
                }
            }

            xhr.open('GET', url + uji, true);
            xhr.send();
        });


        $("#tanggal").on('change', function() {
            const dataAwal = $(awal).val();
            const dataAkhir = $(akhir).val();
            const dataBerangkat = $("#tanggal").val();
            const url = "<?= base_url()  ?>/Tampilan/ajax";
            const params = {
                awal: dataAwal,
                akhir: dataAkhir,
                tanggal: dataBerangkat
            }
            const uji = formatParams(params);

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    tiket.innerHTML = xhr.responseText;
                }
            }

            xhr.open('GET', url + uji, true);
            xhr.send();
        });


        $("#tambah").on("click", function() {
            const AngkaPenumpang = Number($("#angka").text());
            const tambahAngkaPenumpang = AngkaPenumpang + 1;
            $("#angka").text(tambahAngkaPenumpang);
            $("#ortu").val(tambahAngkaPenumpang);
            $("#tambah").val(tambahAngkaPenumpang);
        })

        $("#kurang").on("click", function() {
            const AngkaPenumpang = Number($("#angka").text());
            if (AngkaPenumpang == 1) {
                $("#kurang").attr('disabled');
            } else {
                const kurangAngkaPenumpang = AngkaPenumpang - 1;
                $("#angka").text(kurangAngkaPenumpang);
                $("#ortu").val(kurangAngkaPenumpang);
                $("#tambah").val(kurangAngkaPenumpang);
            }
        });

        $("#tambah1").on("click", function() {
            const AngkaPenumpang = Number($("#angka1").text());
            const tambahAngkaPenumpang = AngkaPenumpang + 1;
            $("#angka1").text(tambahAngkaPenumpang);
            $("#anak").val(tambahAngkaPenumpang);
            $("#tambah").val(tambahAngkaPenumpang);
        })

        $("#kurang1").on("click", function() {
            const AngkaPenumpang = Number($("#angka1").text());
            if (AngkaPenumpang == 0) {
                $("#kurang1").attr('disabled');
            } else {
                const kurangAngkaPenumpang = AngkaPenumpang - 1;
                $("#angka1").text(kurangAngkaPenumpang);
                $("#anak").val(kurangAngkaPenumpang);
                $("#tambah").val(kurangAngkaPenumpang);
            }
        });


        $("#kurang5").on("click", function() {
            const AngkaPenumpang = Number($("#angka5").text());
            if (AngkaPenumpang == 0) {
                $("#kurang5").attr('disabled');
            } else {
                const kurangAngkaPenumpang = AngkaPenumpang - 1;
                $("#angka5").text(kurangAngkaPenumpang);
                $("#ortu1").val(kurangAngkaPenumpang);
                $("#tambah").val(kurangAngkaPenumpang);
            }
        });

        $("#tambah5").on("click", function() {
            const AngkaPenumpang = Number($("#angka5").text());
            const tambahAngkaPenumpang = AngkaPenumpang + 1;
            $("#angka5").text(tambahAngkaPenumpang);
            $("#ortu1").val(tambahAngkaPenumpang);
            $("#tambah").val(tambahAngkaPenumpang);
        });

        $("#kurang6").on("click", function() {
            const AngkaPenumpang = Number($("#angka6").text());
            if (AngkaPenumpang == 0) {
                $("#kurang6").attr('disabled');
            } else {
                const kurangAngkaPenumpang = AngkaPenumpang - 1;
                $("#angka6").text(kurangAngkaPenumpang);
                $("#anak1").val(kurangAngkaPenumpang);
                $("#tambah").val(kurangAngkaPenumpang);
            }
        });

        $("#tambah6").on("click", function() {
            const AngkaPenumpang = Number($("#angka6").text());
            const tambahAngkaPenumpang = AngkaPenumpang + 1;
            $("#angka6").text(tambahAngkaPenumpang);
            $("#anak1").val(tambahAngkaPenumpang);
            $("#tambah").val(tambahAngkaPenumpang);
        });
    </script>
</body>

</html>