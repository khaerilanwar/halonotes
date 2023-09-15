<?= $this->extend("layouts/templateBS"); ?>

<?= $this->section('content'); ?>

<div class="list-group list-group-horizontal-sm mb-1 text-center">
    <a class="list-group-item list-group-item-action rounded-end rounded-4" href="/piutang">Dihutangkan</a>
    <a class="list-group-item list-group-item-action active rounded-start rounded-4" href="/piutang/riwayat">Riwayat</a>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Debitur</th>
                        <th>Nominal</th>
                        <th>Tanggal Piutang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($piutangLunas as $data) : ?>
                        <tr>
                            <td><?= $data['nama']; ?></td>
                            <td><?= 'Rp. ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                            <td><?= $data['tanggal']; ?></td>
                            <td>
                                <span class="badge <?= ($data['status'] === 'Belum Lunas' ? 'bg-danger' : 'bg-success'); ?>"><?= $data['status']; ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>