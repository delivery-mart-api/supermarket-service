<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container h-full text-center">
        <h2 class="my-5"><?= $error; ?></h2>
        <div class="row">
            <div class="col">
                <a href="<?=base_url('/');?>" class="btn btn-primary my-5">Go Back to Home</a>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
