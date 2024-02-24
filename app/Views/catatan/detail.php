<?= $this->extend('layouts/templateBS');; ?>

<?= $this->section('content');; ?>
<?php

use CodeIgniter\I18n\Time; ?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img class="mx-auto d-block" src="/assets/img/detail ilustrate.png" alt="Penggunaan Dana">
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <tr>
                                <td class="w-25">Nama Produk</td>
                                <td class="p-0">:</td>
                                <td><?= $catatan['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Jenis Produk</td>
                                <td class="p-0">:</td>
                                <td><?= ucfirst($catatan['jenis_produk']); ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Kategori Produk</td>
                                <td class="p-0">:</td>
                                <td><?= $catatan['nama_kategori']; ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Jumlah Beli</td>
                                <td class="p-0">:</td>
                                <td><?= $catatan['jumlah_beli']; ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Tanggal Beli</td>
                                <td class="p-0">:</td>
                                <td><?= Time::createFromFormat('Y-m-d', $catatan['tanggal_beli'])->format('d F Y'); ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Keperluan</td>
                                <td class="p-0">:</td>
                                <td><?= $catatan['keperluan']; ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Catatan</td>
                                <td class="p-0">:</td>
                                <td><?= $catatan['catatan']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>