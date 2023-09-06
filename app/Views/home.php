<?= $this->extend('/layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="sm:ml-64">
    <div class="p-4 min-h-screen">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="dark:text-white font-medium text-xl md:text-4xl text-center">Selamat Datang Administrator 👋</h1>
        </div>
    </div>

    <?= $this->include('/layouts/footer'); ?>
</div>

<?= $this->endSection(); ?>