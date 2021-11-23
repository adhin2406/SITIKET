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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/animate.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/auth.css">

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
    <script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>

    <script src="<?= base_url() ?>/js/animsition.min.js"></script>

    <script src="<?= base_url() ?>/js/popper.js"></script>
    <script src="<?= base_url() ?>/js/select2.min.js"></script>

    <script src="<?= base_url() ?>/js/moment.min.js"></script>
    <script src="<?= base_url() ?>/js/daterangepicker.js"></script>

    <script src="<?= base_url() ?>/js/countdowntime.js"></script>
    <script src="<?= base_url() ?>/js/main.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        (function($) {
            "use strict";
            $(".input100").each(function() {
                $(this).on("blur", function() {
                    if ($(this).val().trim() != "") {
                        $(this).addClass("has-val");
                    } else {
                        $(this).removeClass("has-val");
                    }
                });
            });
            var input = $(".validate-input .input100");
            $(".validate-form").on("submit", function() {
                var check = true;
                for (var i = 0; i < input.length; i++) {
                    if (validate(input[i]) == false) {
                        showValidate(input[i]);
                        check = false;
                    }
                }
                return check;
            });

            $(".validate-form .input100").each(function() {
                $(this).focus(function() {
                    hideValidate(this);
                });
            });

            function validate(input) {
                if ($(input).attr("type") == "email" || $(input).attr("name") == "email") {
                    if (
                        $(input)
                        .val()
                        .trim()
                        .match(
                            /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/
                        ) == null
                    ) {
                        return false;
                    }
                } else {
                    if ($(input).val().trim() == "") {
                        return false;
                    }
                }
            }

            function showValidate(input) {
                var thisAlert = $(input).parent();
                $(thisAlert).addClass("alert-validate");
            }

            function hideValidate(input) {
                var thisAlert = $(input).parent();
                $(thisAlert).removeClass("alert-validate");
            }
        })(jQuery);
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"699712271b6effa0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.9.0","si":100}'></script>
</body>

</html>