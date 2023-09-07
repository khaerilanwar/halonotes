<?= $this->extend('/layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="fixed top-0 left-0 right-0 bottom-0 bg-slate-300 -z-10 h-full w-full dark:hidden"></div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="absolute top-[10vh] left-1/2 z-10 transform -translate-x-1/2 -translate-y-1/2">
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <?= session()->getFlashdata('warna'); ?>
            <div class="mx-3 text-sm text-black dark:text-white font-normal"><?= session()->getFlashdata('pesan'); ?></div>
            <button id="tutup-alert" type="button" class="ml-auto -mx-1.5 -my-1.5 text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
<?php endif; ?>


<!-- component -->
<?php
$errorMessage = ['username' => null, 'password' => null];
session()->getFlashdata('errorInput') ? $errorMessage = session()->getFlashdata('errorInput') : '';
?>
<!-- This is an example component -->
<div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center">
        <div class="relative sm:max-w-sm w-full mt-24 sm:mt-0">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 dark:bg-slate-800 shadow-md">
                <label for="" class="block mt-3 md:text-2xl text-xl text-gray-700 dark:text-white text-center font-semibold">
                    Masuk
                </label>
                <form method="post" action="/masuk/login" class="mt-10">
                    <?= csrf_field(); ?>
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium <?= ($errorMessage['username']) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Username</label>
                        <input type="text" name="username" value="<?= old('username'); ?>" id="username" class="<?= ($errorMessage['username']) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Username" autofocus>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $errorMessage['username']; ?></p>
                    </div>
                    <div>
                        <label for="error" class="block mb-2 text-sm font-medium <?= ($errorMessage['password']) ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white'; ?>">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="<?= ($errorMessage['password']) ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'; ?>" placeholder="Kata Sandi">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?= $errorMessage['password']; ?></p>
                    </div>

                    <div class="mt-7 flex">
                        <div class="w-full text-right">
                            <a class="underline text-sm text-gray-600 dark:text-white hover:text-gray-900" href="#">
                                Lupa Kata Sandi ?
                            </a>
                        </div>
                    </div>

                    <div class="mt-7">
                        <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105" type="submit">
                            Masuk
                        </button>
                    </div>

                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2 dark:text-white">Belum punya akun?</label>
                            <a href="/daftar" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Daftar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>