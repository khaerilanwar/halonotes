<?= $this->extend('layouts/templateBS'); ?>

<?= $this->section('content'); ?>

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 ms-3">
                    <h4 class="card-title">Tambah Catatan Penggunaan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/catatan/store" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="nama_produk">Nama Produk</label>
                                        <input type="text" value="<?= set_value('nama_produk'); ?>" id="nama_produk" class="form-control <?= validation_show_error('nama_produk') ? 'is-invalid' : ''; ?>" placeholder="Nama Produk" name="nama_produk">
                                        <?php if (validation_show_error('nama_produk')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('nama_produk'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="kategori_produk">Kategori Produk</label>
                                        <select class="form-select <?= validation_show_error('id_kategori') ? 'is-invalid' : ''; ?>" name="id_kategori" id="kategori_produk">
                                            <option selected disabled>Pilih Kategori</option>
                                            <?php foreach ($categories as $category) : ?>
                                                <option <?= set_value('id_kategori') == $category['id'] ? 'selected' : ''; ?> value="<?= $category['id']; ?>"><?= $category['nama_kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if (validation_show_error('id_kategori')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('id_kategori'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="jumlah_beli">Jumlah Beli</label>
                                        <input type="text" value="<?= set_value('jumlah_beli'); ?>" id="jumlah_beli" class="form-control <?= validation_show_error('jumlah_beli') ? 'is-invalid' : ''; ?>" placeholder="Jumlah Beli" name="jumlah_beli">
                                        <?php if (validation_show_error('jumlah_beli')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('jumlah_beli'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="jenis_produk">Jenis Produk</label>
                                        <select class="form-select" name="jenis_produk" id="jenis_produk">
                                            <option value="barang">Barang</option>
                                            <option value="jasa">Jasa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="keperluan">Keperluan</label>
                                        <input type="text" value="<?= set_value('keperluan'); ?>" id="keperluan" class="form-control <?= validation_show_error('nama_produk') ? 'is-invalid' : ''; ?>" name="keperluan" placeholder="Keperluan">
                                        <?php if (validation_show_error('keperluan')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('keperluan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mx-md-3">
                                        <label class="mb-1" for="tanggal_beli">Tanggal Beli</label>
                                        <input type="date" value="<?= set_value('tanggal_beli'); ?>" id="tanggal_beli" class="form-control <?= validation_show_error('tanggal_beli') ? 'is-invalid' : ''; ?>" name="tanggal_beli" placeholder="Tanggal Beli">
                                        <?php if (validation_show_error('tanggal_beli')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('tanggal_beli'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3 mx-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea class="form-control <?= validation_show_error('catatan') ? 'is-invalid' : ''; ?>" name="catatan" id="catatan" rows="3"><?= set_value('catatan'); ?></textarea>
                                        <?php if (validation_show_error('catatan')) : ?>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                <?= validation_show_error('catatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>