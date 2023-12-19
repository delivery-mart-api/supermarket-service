<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="min-height: 92vh;">
    <div class="row" style="min-height: 92vh;">
        <div class="col-10" style="min-height: 92vh;">
            <h2 class="mt-4">Selamat datang, <?= session()->get('num_user')['name']; ?>!</h2>
            <div class="d-flex justify-content-between align-items-center my-4">
                <h4>Product Management</h4>
            </div>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('gagal'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            
            <table class="table mt-4 mx-2 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($products as $product) : ?>
                    <tr>
                        <th class="pt-3" scope="row"><?= $i++; ?></th>
                        <td><img src="<?= $product['gambar']; ?>" alt="gambar produk" class="product-image"></td>
                        <td class="pt-3"><?= $product['nama']; ?></td>
                        <td class="pt-3"><?= $product['stok']; ?></td>
                        <td class="pt-3"><?= $product['berat']; ?></td>
                        <td class="pt-3"><?= $product['harga']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end">
                            <a href="#editModal<?= $product['id']; ?>" class="btn btn-success" data-bs-toggle="modal">
                                Edit Product
                            </a>
                            </div>
                            <div class="modal fade" id="editModal<?= $product['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $product['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Product</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></∂>
                                        </div>
                                        <form action="branch/products/<?= $product['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="gambarLama" value="<?= $product['gambar']; ?>">
                                            <div class="modal-body">
                                                <div class="row my-2">
                                                    <div class="col">
                                                        <label for="edit-stok" class="form-label">Jumlah Stok</label>
                                                        <input type="number" min="0" class="form-control" id="edit-stok" name="stok" value="<?= $product['stok']; ?>"/>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_method" value="PUT">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php foreach ($products as $product) : ?>
    <script>
      $('#editModal<?= $product['id']; ?>').on('shown.bs.modal', function (event) {
         var modal = $(this);
         modal.find('#edit-stok').val('<?= $product['stok']; ?>');
      });
   </script>
<?php endforeach; ?>
<?= $this->endSection(); ?>