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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if (session()->getFlashdata('lunas')) : ?>
        <script>
            swal("Lunas!", "<?= session()->getFlashdata('lunas'); ?>!", "success");
        </script>
    <?php endif; ?>
</body>

</html>