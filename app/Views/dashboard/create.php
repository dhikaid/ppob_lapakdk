<?php $this->extend("template/template_dashboard"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <h2>Create <?= strtoupper($jenis); ?></h2>
    <div class="card mb-3 mt-3 shadow p-3 mb-5 bg-body-tertiary rounded">
        <?php if ($jenis === "kategori") : ?>
            <div class="card-body">
                <label for="inputPassword5" class="form-label">Nama Kategori</label>
                <input type="text" name="nkategori" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
            <div class="card-body">
                <label for="inputPassword5" class="form-label">Detail Kategori</label>
                <input type="text" name="dkategori" class="form-control" aria-describedby="passwordHelpBlock">
            </div>

        <?php elseif ($jenis === "produk") : ?>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</section>
<?php $this->endSection(); ?>