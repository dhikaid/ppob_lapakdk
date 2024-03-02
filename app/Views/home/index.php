<?php $this->extend("template/template"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <div class="judul mt-4">
        <h2>Prepaid</h2>
    </div>
    <div class=" text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <a class="col text-decoration-none" href="<?= base_url('/produk/pulsadata'); ?>">
                <div class="p-3">
                    <div class="card shadow mb-5 bg-body-tertiary rounded">
                        <img src="https://cdn.mobilepulsa.net/iak/assets/img/icon/Pulsa.svg" height="100" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>Paket dan Pulsa</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col text-decoration-none" href="<?= base_url('/produk/plntoken'); ?>">
                <div class="p-3">
                    <div class="card shadow mb-5 bg-body-tertiary rounded">
                        <img src="https://cdn.mobilepulsa.net/iak/assets/img/icon/Pln.svg" height="100" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>PLN Token</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>