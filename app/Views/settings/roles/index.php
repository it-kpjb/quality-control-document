<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="clearfix">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Roles Managament</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if (has_permission('roles.create')) : ?>
                        <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addModal">
                            Add Roles
                        </button>
                    <?php endif ?>
                    <div class="row">
                        <?= $this->include('templates/alerts') ?>
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($roles as $key => $item) : ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $item['name'] ?> </td>
                                                <td><?= $item['description'] ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-primary mr-1" href="<?= base_url('roles/edit/' . $item['id']) ?>" data-toggle="tooltip" title="Edit permission"><i class="fa fa-shield"></i></a>
                                                    <button type="button" class="btn btn-warning mr-1" data-toggle="modal" data-target="#editModal-<?= $item['id'] ?>" title="Edit"><i class="fa fa-pencil"></i></button>

                                                    <?php if (has_permission('roles.delete')) : ?>
                                                        <button onclick="hapus('<?= base_url('roles/delete/' . $item['id'])  ?>')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" href="#deleteModal"><i class="fa fa-trash"></i></button>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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

<?= $this->include('settings/roles/modal_data') ?>
<?= $this->endSection() ?>