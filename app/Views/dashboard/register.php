<?php $this->extend("template/template_oauth"); ?>

<?php $this->section("content"); ?>

<section class="index-home container ">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h2 class="text-center mb-4">Dashboard Area</h2>
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded ">
            <form action="<?= base_url('/users/register'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <?php if (isset($validation['username'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation['username']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <?php if (isset($validation['email'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation['email']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">No. HP</label>
                        <input type="phone" name="nohp" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <?php if (isset($validation['nohp'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation['nohp']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <?php if (isset($validation['password'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation['password']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-outline-light" type="submit">Daftar</button>
                    </div>
                    <i>Sudah register? <a href="<?= base_url('/login'); ?>">klik disini</a></i>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>