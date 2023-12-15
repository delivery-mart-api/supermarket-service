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
                            <form action="products/save" method="post">
                                <?= csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="tambah-nama" class="form-label">Nama Produk</label>
                                            <input required type="text" class="form-control" id="tambah-nama" name="nama" />
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
                                        <div class="col">
                                            <label for="tambah-gambar" class="form-label">Gambar Produk</label>
                                            <input required type="text" class="form-control" id="tambah-gambar" name="gambar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
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
                                <button type="button" class="me-5 btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">
                                    Edit Product
                                </button>
                            </div>
                            <div class="modal fade modal-xl" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Product</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="edit-nama" class="form-label">Nama Produk</label>
                                                        <input type="text" class="form-control" id="edit-nama" name="nama" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="edit-harga" class="form-label">Harga Produk</label>
                                                        <input type="text" class="form-control" id="edit-harga" name="harga" />
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-6">
                                                        <label for="edit-stok" class="form-label">Jumlah Stok</label>
                                                        <input type="text" class="form-control" id="edit-stok" name="stock" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="edit-berat" class="form-label">Berat Produk</label>
                                                        <input type="text" class="form-control" id="edit-berat" name="berat" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger">Delete Product</button>
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
<?= $this->endSection(); ?>