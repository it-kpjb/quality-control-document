<?= $this->extend('templates/index') ?>

<?= $this->section('content') ?>

<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= (in_groups('superadmin') || in_groups('qcdoc')  ) ? 'List Data User' : 'Profile User' ?> </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if (in_groups('superadmin')|| in_groups('qcdoc') ) : ?>
                        <a type="button" class="btn btn-primary mb-5" href="/users/add-user">
                            Add User
                        </a>
                    <?php endif ?>
                    <div class="row">
                        <?= $this->include('templates/alerts') ?>

                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <?php if (in_groups('superadmin')) : ?>
                                                <th>Active</th>
                                            <?php endif ?>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $key => $rw) {
                                            if ($rw->id == user_id()) {
                                                $row = "row" . $rw->id;
                                                echo $$row;
                                            } elseif (in_groups('superadmin')|| in_groups('qcdoc') ) {
                                                $row = "row" . $rw->id;
                                                echo $$row;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->include('settings/users/modal-changeGroup');
?>

<?php $this->section('scripts') ?>

<script>
    $('.btn-change-group').on('click', function() {
        const id = $(this).data('id');
        console.log(id)
        $('.id').val(id);
        $('#changeGroupModal').modal('show');
    });

    $('.btn-active-users').on('click', function() {
        const id = $(this).data('id');

        $('.id').val(id);
        $('#changeActiveModal').modal('show');
    });
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>