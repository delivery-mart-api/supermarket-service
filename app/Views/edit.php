<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container pt-2 pb-5">
    <h2>Edit Product</h2>

    <div>
        <img src="<?= ($product['gambar']); ?>" alt="" class="w-25 img-preview">
    </div>

    <form action="<?= base_url('products/update/' . $product['id']); ?>" method="post">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col">
                <label for="edit-nama" class="form-label">Nama Produk</label>
                <?php if (session('validation') && session('validation')->hasError('nama'))  : ?>
                    <input type="text" class="form-control is-invalid" id="edit-nama" name="nama" value="<?= $product['nama']; ?>" />
                    <div class="invalid-feedback">
                        <?= session('validation')->getError('nama'); ?>
                    </div>
                <?php else : ?>    
                    <input type="text" class="form-control" id="edit-nama" name="nama" value="<?= $product['nama']; ?>" />
                <?php endif ?>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label for="edit-kategori" class="form-label">Kategori Produk</label>
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02" name="kategori">
                        <option selected>Pilih Kategori</option>
                        <option value="Minuman" <?= ($product['kategori'] == 'Minuman') ? 'selected' : ''?>>Minuman</option>
                        <option value="Daging" <?= ($product['kategori'] == 'Daging') ? 'selected' : ''; ?>>Daging</option>
                        <option value="Sayuran" <?= ($product['kategori'] == 'Sayuran') ? 'selected' : ''; ?>>Sayuran</option>
                        <option value="Buah" <?= ($product['kategori'] == 'Buah') ? 'selected' : ''; ?>>Buah</option>
                        <option value="Peralatan Mandi" <?= ($product['kategori'] == 'Peralatan Mandi') ? 'selected' : ''; ?>>Peralatan Mandi</option>
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                </div> 
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label for="edit-harga" class="form-label">Harga Produk</label>
                <?php if (session('validation') && session('validation')->hasError('harga'))  : ?>
                    <input type="number" class="form-control is-invalid" id="edit-harga" name="harga" value="<?= $product['harga']; ?>"/>
                    <div class="invalid-feedback">
                        <?= session('validation')->getError('harga'); ?>
                    </div>
                <?php else: ?>
                        <input type="number" class="form-control" id="edit-harga" name="harga" value="<?= $product['harga']; ?>"/>
                <?php endif; ?>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label for="edit-stok" class="form-label">Jumlah Stok</label>
                <?php if (session('validation') && session('validation')->hasError('stok'))  : ?>
                    <input type="number" class="form-control is-invalid" id="edit-stok" name="stok" value="<?= $product['stok']; ?>"/>
                    <div class="invalid-feedback">
                        <?= session('validation')->getError('stok'); ?>
                    </div>
                <?php else: ?>
                        <input type="number" class="form-control" id="edit-stok" name="stok" value="<?= $product['stok']; ?>"/>
                <?php endif; ?>
            </div>
        </div>
        <div class="row my-2">  
            <div class="col">
                <label for="edit-berat" class="form-label">Berat Produk</label>
                <?php if (session('validation') && session('validation')->hasError('berat'))  : ?>
                    <input type="number" class="form-control is-invalid" id="edit-berat" name="berat" value="<?= $product['berat']; ?>"/>
                    <div class="invalid-feedback">
                        <?= session('validation')->getError('berat'); ?>
                    </div>
                <?php else : ?>
                    <input type="number" class="form-control" id="edit-berat" name="berat" value="<?= $product['berat']; ?>"/>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</div>
<?= $this->endSection(); ?>
