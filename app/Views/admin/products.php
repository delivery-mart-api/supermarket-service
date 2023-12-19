<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="min-height: 92vh;">
    <div class="row" style="min-height: 92vh;">
        <div class="col-10" style="min-height: 92vh;">
            <h2 class="mt-3">Halo, <?= session()->get('num_user')['name']; ?></h2>
            <div class="d-flex justify-content-between align-items-center my-4">
                <h4>Product Management</h4>
                <a href="/admin/create" class="btn btn-success">
                    Add Product
                </a>
            </div>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <table class="table mt-4 mx-2 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
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
                        <td class="pt-3"><?= $product['berat']; ?></td>
                        <td class="pt-3"><?= $product['harga']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="admin/edit/<?= $product['id']?>" class="btn btn-success">
                                    Edit Product
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="/products/<?= $product['id'] ;?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $product['nama'];?>?')">Delete Product</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('button[data-bs-target^="#editModal"]').on('click', function() {
            var productId = $(this).data('product-id');
            var modalId = '#editModal' + productId;

            // Isi formulir dengan data produk berdasarkan ID
            $(modalId + ' #edit-nama').val('<?= $product['nama']; ?>');
            $(modalId + ' #edit-harga').val('<?= $product['harga']; ?>');
            $(modalId + ' #edit-berat').val('<?= $product['berat']; ?>');
            $(modalId + ' #gambar').val(''); // Bersihkan input file
        });
    });
</script>
<?= $this->endSection(); ?>