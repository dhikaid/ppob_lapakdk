p<?php $this->extend("template/template"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <div class="m-3 text-center">
        <h2>Pulsa dan Paket Data</h2>
    </div>


    <div class="card shadow mb-5 bg-body-tertiary rounded">
        <div class="card-body">
            <form method="post" action="<?= base_url("produk/postdataprepaid"); ?>">
                <div class="input-group input-group-lg mb-3">
                    <input required minlength="5" type="number" class="form-control" name="prepaidnum" placeholder="Masukan Nomor Telepon" value="<?= session()->get("prepaidnum"); ?>" aria-label="Masukan Nomor Telepon" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <?php if (session()->get('prepaidnum')) : ?>
        <div class="row">
            <div class="col-md">
                <div class="card shadow mb-5 bg-body-tertiary rounded">
                    <div class="contentutama">
                        <div class="m-3">
                            <h3>Pulsa <?= strtoupper($datas['operator']); ?></h3>
                            <hr>
                        </div>
                        <div class="content-pulsa" style="height: 50vh;overflow-y: scroll;">
                            <?php foreach ($datas['list'] as $l) : ?>
                                <?php if ($l['product_type'] == "pulsa") : ?>
                                    <a class="col text-decoration-none" href="<?= base_url('/produk/paket-pulsa'); ?>">
                                        <div class="p-3">
                                            <div class="card shadow mb-2 bg-body-tertiary rounded">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= strtoupper($l['product_type'] . " " . rupiah($l['product_price'])) ?></h5>
                                                    <!-- <p class="card-text"><?= $l['product_nominal']; ?></p> -->
                                                </div>
                                                <div class="card-footer text-body-secondary">
                                                    <h5><?= rupiah($l['product_price']); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow mb-5 bg-body-tertiary rounded">
                    <div class="contentutama">
                        <div class="m-3">
                            <h3>Paket Data <?= strtoupper($datas['operator']); ?></h3>
                            <hr>
                        </div>
                        <div class="content-pulsa" style="height: 50vh;overflow-y: scroll;">
                            <?php foreach ($datas['list'] as $l) : ?>
                                <?php if ($l['product_type'] == "data") : ?>
                                    <a class="col text-decoration-none" href="<?= base_url('/produk/paket-pulsa'); ?>">
                                        <div class="p-3">
                                            <div class="card shadow mb-2 bg-body-tertiary rounded">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $l["product_nominal"] ?></h5>
                                                    <p class="card-text"><?= $l['product_details']; ?></p>
                                                </div>
                                                <div class="card-footer text-body-secondary">
                                                    <h5><?= rupiah($l['product_price']); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


</section>
<?php $this->endSection(); ?>