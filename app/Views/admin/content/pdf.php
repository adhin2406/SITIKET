<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title><?= $title ?></title>

    <style>
        .laporan {
            margin-top: 10% !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="laporan">
            <h1>
                Laporan Penjualan Tiket sitiket
            </h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">kode pesan</th>
                        <th scope="col">tanggal pesan</th>
                        <th scope="col">tempat pesan</th>
                        <th scope="col">tujuan destinasi</th>
                        <th scope="col">total bayar</th>
                        <th scope="col">kode kursi </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pesanan as $data) : ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $data['kode_pesan'] ?></td>
                            <td><?= $data['tanggal_pesan'] ?></td>
                            <td><?= $data['tempat_pesan'] ?></td>
                            <td><?= $data['tujuan'] ?></td>
                            <td><?= $data['total_bayar'] ?></td>
                            <td><?= $data['kode_kursi_ku'] ?></td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>