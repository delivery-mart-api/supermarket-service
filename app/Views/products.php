<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="min-height: 92vh;">
    <div class="row" style="min-height: 92vh;">
        <div class="col-10" style="min-height: 92vh;">
            <div class="d-flex justify-content-between align-items-center my-4">
                <h4>Product Management</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add Product
                </button>
                <div class="modal fade modal-xl" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="products/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="modal-body">
                                    <h3><?= $validation; ?></h3>
                                    <div class="row">
                                        <div class="col">
                                            <label for="tambah-nama" class="form-label">Nama Produk</label>
                                            <input required type="text" class="form-control" id="tambah-nama" name="nama" />
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <label for="tambah-nama" class="form-label">Kategori Produk</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="inputGroupSelect02" name="kategori">
                                                    <option selected>Pilih Kategori</option>
                                                    <option value="Minuman">Minuman</option>
                                                    <option value="Daging">Daging</option>
                                                    <option value="Sayuran">Sayuran</option>
                                                    <option value="Buah">Buah</option>
                                                    <option value="Peralatan Mandi">Peralatan Mandi</option>
                                                </select>
                                                <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <label for="tambah-harga" class="form-label">Harga Produk</label>
                                            <input required type="number" class="form-control" id="tambah-harga" name="harga" />
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <label for="tambah-stok" class="form-label">Jumlah Stok</label>
                                            <input required type="number" class="form-control" id="tambah-stok" name="stok" />
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <label for="tambah-berat" class="form-label">Berat Produk</label>
                                            <input required type="number" class="form-control" id="tambah-berat" name="berat" />
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                    <!-- <div class="row my-2">
                                        <div class="col">
                                            <label for="gambar" class="form-label">Gambar Produk</label>
                                            <div>
                                                <img src="/img/default.png" alt="box" class="w-25 img-preview">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg()">                                            
                                            </div>
                                        </div>
                                    </div>                                
                                    </div>                                 -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add Product</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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

            <!-- data produk -->
            <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    </div>
                </div>
                </div> -->
            
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($products as $product) : ?>
                    <tr>
                        <th class="pt-3" scope="row"><?= $i++; ?></th>
                        <td><img src="img/<?= $product['gambar']; ?>" alt="gambar produk" class="product-image"></td>
                        <td class="pt-3"><?= $product['nama']; ?></td>
                        <td class="pt-3"><?= $product['stok']; ?></td>
                        <td class="pt-3"><?= $product['berat']; ?></td>
                        <td class="pt-3"><?= $product['harga']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="/edit/<?= $product['id']?>" class="btn btn-success">
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
            $(modalId + ' #edit-stok').val('<?= $product['stok']; ?>');
            $(modalId + ' #edit-berat').val('<?= $product['berat']; ?>');
            $(modalId + ' #gambar').val(''); // Bersihkan input file
        });
    });
</script>
<?= $this->endSection(); ?>