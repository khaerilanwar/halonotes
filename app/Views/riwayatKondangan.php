<?= $this->extend("layouts/templateBS"); ?>

<?= $this->section("content"); ?>

<div class="list-group list-group-horizontal-sm mb-1 text-center">
    <a class="list-group-item list-group-item-action rounded-end rounded-4" href="/kondangan">Kondangan</a>
    <a class="list-group-item list-group-item-action rounded-start rounded-4 active" href="/kondangan/riwayat">Riwayat</a>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nominal Saya</th>
                        <th>Nominal Tamu</th>
                        <th>Alamat</th>
                        <th>Tanggal Kondangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kondanganSelesai as $data) : ?>
                        <tr>
                            <td><?= $data['nama']; ?></td>
                            <td><?= 'Rp. ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                            <td><?= 'Rp. ' . number_format($data['nominal_kondangan'], 0, ',', '.') ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['tanggal']; ?></td>
                            <td>
                                <span class="badge <?= ($data['status'] === 'Belum Datang' ? 'bg-danger' : 'bg-success'); ?>"><?= $data['status']; ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

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