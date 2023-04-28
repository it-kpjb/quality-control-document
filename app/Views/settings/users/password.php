<?= $this->extend('templates/index') ?>

<?= $this->section('content') ?>
<div class="">
    <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
</div>

<?= view('\Myth\Auth\Views\_message_block') ?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card shadow my-4 ">
            <div class="card-header">
                <h4>Edit Password User</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>/users/change-password/<?= $users->id ?>" class="user" method="post">
                    <?= csrf_field() ?>
                    <input hidden type="text" name="id" value="<?= $users->id ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="password"><?= lang('Auth.password') ?></label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Edit Password</button>
                    <a href="/users" class="btn btn-secondary btn-user btn-block">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>