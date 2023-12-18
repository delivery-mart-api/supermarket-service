<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Produk</h2>
            <form action="/admin/products/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <?php if (session('validation') && session('validation')->hasError('nama')) : ?>
                            <input type="text" class="form-control is-invalid" id="nama" name="nama" autofocus>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('nama'); ?>
                            </div>
                        <?php else : ?>    
                            <input type="text" class="form-control" id="nama" name="nama" autofocus>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                    <div class="col">
                        <select class="form-select" id="inputGroupSelect02" name="kategori">
                            <option selected>Pilih Kategori</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Daging">Daging</option>
                            <option value="Sayuran">Sayuran</option>
                            <option value="Buah">Buah</option>
                            <option value="Peralatan Mandi">Peralatan Mandi</option>
                        </select>
                    </div>                                        
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <?php if (session('validation') && session('validation')->hasError('harga')) : ?>
                            <input type="number" class="form-control is-invalid" id="harga" name="harga">
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('harga'); ?>
                            </div>
                        <?php else : ?>    
                            <input type="number" class="form-control" id="harga" name="harga">
                        <?php endif ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="berat" class="col-sm-2 col-form-label">Berat</label>
                    <div class="col-sm-10">
                        <?php if (session('validation') && session('validation')->hasError('berat')) : ?>
                            <input type="number" class="form-control is-invalid" id="berat" name="berat">
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('berat'); ?>
                            </div>
                        <?php else : ?>    
                            <input type="number" class="form-control" id="berat" name="berat">
                        <?php endif ?>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
        </div>
    </div>
</div>
       
<?= $this->endSection(); ?>