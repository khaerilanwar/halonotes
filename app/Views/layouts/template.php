<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- STYLE TAILWINDCSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="/assets/img/halonotes.ico" type="image/x-icon">
    <!-- FLOWBITE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <!-- CDN FONTAWESOME -->
    <script src="https://kit.fontawesome.com/addf044e73.js" crossorigin="anonymous"></script>
</head>

<body class="dark:bg-slate-900">

    <?= (preg_match('/Sign In/', $title) || preg_match('/Registrasi/', $title)) ? '' : $this->include('layouts/navbar') ?>

    <?= (preg_match('/Sign In/', $title) || preg_match('/Registrasi/', $title)) ? '' : $this->include('layouts/sidebar') ?>

    <?= $this->renderSection('content'); ?>

    <!-- TOMBOL UNTUK MENGGANTI DARK DAN LIGHT MODE -->
    <input type="checkbox" id="toggle" class="hidden" />
    <label for="toggle">
        <div data-tooltip-target="tooltip-left" data-tooltip-placement="left" class="fixed bottom-2 left-2 z-50 mb-2 md:mb-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
            <i id="ikon" class="m-auto fa-solid fa-moon"></i>
        </div>
        <div id="tooltip-left" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            dark
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </label>
    <!-- END TOMBOL UNTUK MENGGANTI DARK DAN LIGHT MODE -->

    <script>
        // KODE JS UNTUK TOMBOL DARK MODE
        const checkbox = document.querySelector("#toggle");
        const tooltip = document.querySelector("#tooltip-left");
        const html = document.querySelector("html");
        const ikon = document.querySelector("#ikon");

        checkbox.addEventListener("change", function(event) {
            // Mendapatkan status checked checkbox
            var isChecked = event.target.checked;

            // Melakukan sesuatu ketika status checked berubah
            if (isChecked) {
                console.log("Checkbox dicentang");
                sessionStorage.setItem("darkMode", "true");
                console.log(sessionStorage.getItem("darkMode"));
                // Lakukan tindakan yang diinginkan ketika checkbox dicentang
            } else {
                console.log("Checkbox tidak dicentang");
                sessionStorage.removeItem("darkMode");
                sessionStorage.setItem("darkMode", "false");
                console.log(sessionStorage.getItem("darkMode"));
                // Lakukan tindakan yang diinginkan ketika checkbox tidak dicentang
            }

            if (sessionStorage.getItem("darkMode") === "true") {
                // Terapkan gaya dark mode
                html.classList.add("dark");
                tooltip.innerHTML = "light";
                ikon.classList.replace("fa-moon", "fa-lightbulb");
            } else {
                // Terapkan gaya light mode
                ikon.classList.replace("fa-lightbulb", "fa-moon");
                tooltip.innerHTML = "dark";
                html.classList.remove("dark");
            }
        });

        if (sessionStorage.getItem("darkMode") === "true") {
            // Terapkan gaya dark mode
            html.classList.add("dark");
            tooltip.innerHTML = "light";
            ikon.classList.replace("fa-moon", "fa-lightbulb");
        } else {
            // Terapkan gaya light mode
            ikon.classList.replace("fa-lightbulb", "fa-moon");
            tooltip.innerHTML = "dark";
            html.classList.remove("dark");
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>

</html>