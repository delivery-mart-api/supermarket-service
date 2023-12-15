<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid" style="min-height: 92vh;">
    <div class="row" style="min-height: 92vh;">
        <div class="col-2 bg-success d-flex px-0">
            <div class="d-flex flex-column justify-content-start align-items-center gap-3 w-100">
                <h3 class="fs-2 text-center mt-3 text-light">Supermarket System</h3>
                <div class="border-start border-dark border-5 bg-success-subtle w-100 ps-4 py-3 fw-bold">Product Management</div>
            </div>
        </div>
        <div class="col-10" style="min-height: 92vh;">
            <div class="d-flex justify-content-between align-items-center mt-4 ms-3 me-5">
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
                            <form>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="edit-nama" class="form-label">Nama Produk</label>
                                            <input required type="text" class="form-control" id="edit-nama" name="nama" />
                                        </div>
                                        <div class="col-6">
                                            <label for="edit-harga" class="form-label">Harga Produk</label>
                                            <input required type="text" class="form-control" id="edit-harga" name="harga" />
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">
                                            <label for="edit-stok" class="form-label">Jumlah Stok</label>
                                            <input required type="text" class="form-control" id="edit-stok" name="stock" />
                                        </div>
                                        <div class="col-6">
                                            <label for="edit-berat" class="form-label">Berat Produk</label>
                                            <input required type="text" class="form-control" id="edit-berat" name="berat" />
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

            <table class="table mt-4 mx-2 table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="pt-3" scope="row">lorem</th>
                        <td class="pt-3">90000</td>
                        <td class="pt-3">10</td>
                        <td class="pt-3">10</td>
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
                    <tr>
                        <th class="pt-3" scope="row">lorem</th>
                        <td class="pt-3">10000</td>
                        <td class="pt-3">12</td>
                        <td class="pt-3">30</td>
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
                    <tr>
                        <th class="pt-3" scope="row">lorem</th>
                        <td class="pt-3">30000</td>
                        <td class="pt-3">12</td>
                        <td class="pt-3">10</td>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>