<?php $this->extend("template/template_oauth"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h2 class="text-center mb-4">Dashboard Area</h2>
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded ">
            <form action="<?= base_url('/users/login'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" aria-describedby="passwordHelpBlock">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-light" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>