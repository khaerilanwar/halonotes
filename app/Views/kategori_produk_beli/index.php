<?= $this->extend('layouts/templateBS'); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h4 class="text-center mb-3">Tambah Kategori Produk Beli</h4>
                    <form action="/kategori/tambah" method="post">
                        <div class="form-group">
                            <label for="basicInput">Nama Kategori</label>
                            <input type="text" class="form-control <?= validation_show_error('nama_kategori') ? 'is-invalid' : ''; ?>" value="<?= set_value('nama_kategori'); ?>" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori Produk Beli">
                            <?php if (validation_show_error('nama_kategori')) : ?>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    <?= validation_show_error('nama_kategori'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center mb-4">Kategori Produk Catatan</h4>
                    <ul class="list-group pt-3">
                        <?php if ($categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><?= $category['nama_kategori']; ?></span>

                                    <div>
                                        <form class="d-inline" action="/kategori/hapus/<?= $category['id']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" type="submit" class="btn btn-danger py-1 px-2 <?= $category['jumlah_catatan'] == 0 ? '' : 'disabled' ?> ">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $category['jumlah_catatan']; ?> catatan" class="btn btn-info py-1 p-2"><?= $category['jumlah_catatan']; ?></button>

                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h4 class="text-center mt-4">Belum ada kategori</h4>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>