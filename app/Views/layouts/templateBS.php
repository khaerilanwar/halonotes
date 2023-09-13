<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/assets/img/halonotes.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/img/halonotes.png" type="image/png">

    <link rel="stylesheet" href="/assets/css/shared/iconly.css">
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">

    <style>
        /* Menghilangkan tanda panah pada input number */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

</head>

<body>

    <div id="app">
        <?= $this->include('layouts/partials/sidebar'); ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3 class=" mt-4"><?= $heading; ?></h3>
            </div>
            <div class="page-content">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var rupiah = document.getElementById('angkaInputNominal');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <?php if (session()->getFlashdata('lunas')) : ?>
        <script>
            Swal.fire(
                'Lunas!',
                '<?= session()->getFlashdata('lunas'); ?>!',
                'success'
            )
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('tambahPiutang')) : ?>
        <script>
            Swal.fire(
                'Berhasil!',
                '<?= session()->getFlashdata('tambahPiutang'); ?>!',
                'success'
            )
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('tambahHutang')) : ?>
        <script>
            Swal.fire(
                'Berhasil!',
                '<?= session()->getFlashdata('tambahHutang'); ?>!',
                'success'
            )
        </script>
    <?php endif; ?>
</body>

</html>