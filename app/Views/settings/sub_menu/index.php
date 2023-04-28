<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="clearfix">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sub Menu Managament</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addModal">
                        Add Sub Menu
                    </button>
                    <div class="row">
                        <?= $this->include('templates/alerts') ?>
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Menu</th>
                                            <th>Sub Menu Title</th>
                                            <th>Url</th>                                            
                                            <th>Is Active</th>
                                            <th>Sort Menu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($sub_menu as $key => $sm) : ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $sm['menu_title'] ?> </td>
                                                <td><?= $sm['sub_title'] ?></td>
                                                <td><?= $sm['url'] ?></td>                                            
                                                <td><?= $sm['is_active'] ?></td>
                                                <td><?= $sm['sort_menu'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#editModal-<?= $sm['id'] ?>" title="Edit"><i class="fa fa-pencil"></i></button>
                                                    <?php if (has_permission('submenu.delete')) : ?>
                                                        <button onclick="hapus('<?= base_url('submenu/delete/' . $sm['id'])  ?>')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" href="#deleteModal"><i class="fa fa-trash"></i></button>
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

<?= $this->include('settings/sub_menu/modal_data') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>