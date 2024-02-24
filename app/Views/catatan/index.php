<?= $this->extend('layouts/templateBS'); ?>

<?= $this->section('content'); ?>

<a href="/catatan/tambah" type="button" class="mb-2 btn icon icon-lefy btn-success">
    Tambah Catatan</a>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah Beli</th>
                        <th>Tanggal Beli</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produks as $data) : ?>
                        <tr class="border-black border-bottom">
                            <td><?= ucwords($data['nama_produk']); ?></td>
                            <td><?= $data['nama_kategori']; ?></td>
                            <td><?= $data['jumlah_beli']; ?></td>
                            <td><?= $data['tanggal_beli']; ?></td>
                            <td class="">
                                <a href="/catatan/<?= str_replace(' ', '-', strtolower($data['nama_produk'])) . '-' . $data['id']; ?>" class="btn py-1 px-2 btn-primary me-1" title="Detail"><i class="bi bi-eye-fill"></i></a>

                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['id']; ?>" class="btn py-1 px-2 btn-danger me-1" title="Hapus"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<?php foreach ($produks as $data) : ?>

    <div class="modal fade text-left modal-borderless" id="deleteModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $data['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Hapus Catatan</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <p>
                        Apakah anda yakin ?
                    </p>
                </div>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                        <!-- <i class="bx bx-x d-block d-sm-none"></i> -->
                        <!-- <span class="d-none d-sm-block">Batal</span> -->
                        <span>Batal</span>
                    </button>
                    <form action="/catatan/hapus/<?= $data['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                            <!-- <i class="bx bx-check d-block d-sm-none"></i> -->
                            <!-- <span class="d-none d-sm-block">Hapus</span> -->
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?= $this->endSection(); ?>