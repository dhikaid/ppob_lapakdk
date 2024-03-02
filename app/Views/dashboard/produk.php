<?php $this->extend("template/template_dashboard"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <h2>Hai, <?= $username; ?></h2>
    <hr>
    <div class="row mb-3">
        <div class="col-2">
            <h5>Kategori Produk</h5>
        </div>
        <div class="col">
            <a type="button" href="<?= base_url("/dashboard/create/kategori"); ?>" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                + Tambah Kategori
            </a>
        </div>
    </div>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Produk</th>
                <th scope="col">Detail</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
</section>
<?php $this->endSection(); ?>