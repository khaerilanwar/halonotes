<?= $this->extend("layouts/templateBS"); ?>

<?= $this->section("content"); ?>

<div>
    <button data-bs-toggle="modal" data-bs-target="#modalTambahKondangan" type="button" class="mb-2 btn icon icon-lefy btn-success"><i data-feather="plus-circle"></i>
        Tambah Kondangan</button>

    <!-- MODAL TAMBAH DATA HUTANG -->
    <div class="modal fade text-left" id="modalTambahKondangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Data Kondangan</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="/kondangan/tambah-kondangan" method="post">
                    <div class="modal-body">
                        <label>Nama Undangan</label>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Undangan" class="form-control" autocomplete="off">
                        </div>
                        <label>Nominal</label>
                        <div class="form-group">
                            <input type="text" id="angkaInputNominal" name="nominal" placeholder="Nominal Kondangan" class="form-control" autocomplete="off">
                        </div>
                        <label>Alamat Undangan</label>
                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="Alamat Kondangan" class="form-control" autocomplete="off">
                        </div>
                        <label>Tanggal Kondangan</label>
                        <div class="form-group">
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="list-group list-group-horizontal-sm mb-1 text-center">
    <a class="list-group-item list-group-item-action active rounded-end rounded-4" href="/kondangan">Kondangan</a>
    <a class="list-group-item list-group-item-action rounded-start rounded-4" href="/kondangan/riwayat">Riwayat</a>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Alamat</th>
                        <th>Tanggal Kondangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kondangan as $data) : ?>
                        <tr>
                            <td><?= $data['nama']; ?></td>
                            <td><?= 'Rp. ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['tanggal']; ?></td>
                            <td>
                                <span class="badge <?= ($data['status'] === 'Belum Datang' ? 'bg-danger' : 'bg-success'); ?>"><?= $data['status']; ?></span>
                            </td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#lunasModal-<?= $data['id']; ?>" type="button" class="btn icon btn-success me-1" data-bs-toggle-tip="tooltip" data-bs-placement="top" title="Lunas"><i class="bi bi-check"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php foreach ($kondangan as $data) : ?>
        <!--Modal Lunas Hutang -->
        <div class="modal fade text-left" id="lunasModal-<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Lunas Kondangan
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="/kondangan/lunaskan" method="post">
                        <div class="modal-body my-2">
                            <input type="hidden" name="idKondangan" value="<?= $data['id']; ?>">
                            <label>Nama Tamu</label>
                            <div class="form-group">
                                <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" readonly>
                            </div>
                            <label>Nominal Kondangan Sebelumnya</label>
                            <div class="form-group">
                                <input type="text" name="nominalSebelumnya" value="<?= 'Rp. ' . number_format($data['nominal'], 0, ',', '.') ?>" class="form-control" readonly>
                            </div>
                            <label>Nominal Kondangan Tamu</label>
                            <div class="form-group">
                                <input type="text" name="nominalKondangan" placeholder="Nominal Kondangan" class="form-control angkaInputNominals" autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Lunas</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>

<script>
    var rupiah = document.getElementById('angkaInputNominal');
    var nominals = document.querySelectorAll('.angkaInputNominals');

    nominals.forEach(function(nominal) {
        nominal.addEventListener('keyup', function(e) {
            nominal.value = formatRupiah(this.value, 'Rp. ');
        })
    })

    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
</script>

<script>
    // If you want to use tooltips in your project, we suggest initializing them globally
    // instead of a "per-page" level.
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle-tip="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>

<?= $this->endSection(); ?>