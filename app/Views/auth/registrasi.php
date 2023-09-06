<?= $this->extend('/layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="fixed top-0 left-0 right-0 bottom-0 bg-slate-300 -z-10 h-full w-full dark:hidden"></div>

<section class="bg-slate-300 dark:bg-gray-900 md:pt-12">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-heebo font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/assets/img/halonotes.png" alt="logo">
            Halo Notes!
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Buat Akun
                </h1>
                <form class="space-y-4 md:space-y-6" action="/registrasi/save" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-6">
                        <label for="nama" class="block mb-2 text-sm font-medium <?= ($validation->hasError('nama')) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= old('nama'); ?>" id="nama" class="<?= ($validation->hasError('nama')) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Nama Lengkap" autofocus>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $validation->getError('nama'); ?></p>
                    </div>

                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium <?= ($validation->hasError('username')) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Username</label>
                        <input type="text" name="username" value="<?= old('username'); ?>" id="username" class="<?= ($validation->hasError('username')) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Username" autofocus>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $validation->getError('username'); ?></p>
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium <?= ($validation->hasError('password')) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="<?= ($validation->hasError('password')) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Kata Sandi">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $validation->getError('password'); ?></p>
                    </div>

                    <div>
                        <label for="repassword" class="block mb-2 text-sm font-medium <?= ($validation->hasError('repassword')) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Konfirmasi Kata Sandi</label>
                        <input type="password" id="repassword" name="repassword" class="<?= ($validation->hasError('repassword')) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Konfirmasi Kata Sandi">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $validation->getError('repassword'); ?></p>
                    </div>


                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar Akun</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Masuk</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>