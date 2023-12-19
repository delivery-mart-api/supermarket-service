<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container h-full text-center">
        <br><br><br><br><br>
        <h2 class="mt-5">Anda Belum Terdaftar di Layanan Delivery</h2>
        <p class="mt-1 mb-5">Segera daftar dengan username dan password yang sama untuk mengaktifkan fitur ini</p>
        <div class="row">
            <div class="col">
                <a href="<?=base_url('/');?>" class="btn btn-primary my-5">Go Back to Home</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
