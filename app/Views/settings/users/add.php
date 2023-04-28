<?= $this->extend('templates/index') ?>

<?= $this->section('content') ?>
<div class="">
    <h4 class="h4  mb-4"><?= $title ?></h4>
</div>

<?= view('\Myth\Auth\Views\_message_block') ?>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card shadow my-4 ">
            <div class="card-header">
                <h4>Tambah user</h4>
            </div>
            <div class="card-body">

                <form action="<?= base_url(); ?>/users/save" class="user" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="fullname" class="form-control form-control-user <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="<?= lang('Nama Lengkap') ?>" value="<?= old('fullname') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>

                        <div class="col-sm-6">
                            <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>