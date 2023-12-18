<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="mt-4">
            <h2 class="text-primary text-center">Riwayat Order</h2>
            <h2 class="text-left">Profit Share : Rp<?= $profit_share; ?></h2>
        </div>
        <div class="d-flex flex-column p-3 items-center">
            <?php if (empty($orders)) : ?>
                <p class="text-center text-body-secondary fs-5">Belum ada order</p>
            <?php else : ?>
                <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kuantitas</th>
                            <th>Alamat Kirim</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $order['product_name'] ?></td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['address'] ?></td>
                                <td><?= $order['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?= $this->endSection(); ?>
