<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="clearfix">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Menu Managament</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addModal">
                        Add Menu
                    </button>
                    <div class="row">
                        <?= $this->include('templates/alerts') ?>

                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Menu Title</th>
                                            <th>Icon</th>
                                            <th>Url</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($menu as $index => $item) : ?>
                                            <tr>
                                                <td><?= ++$index ?>.</td>
                                                <td><?= $item['menu_title'] ?></td>
                                                <td><?= $item['icon'] ?></td>
                                                <td><?= $item['menu_url'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#editModal-<?= $item['id'] ?>" title="Edit"><i class="fa fa-pencil"></i></button>
                                                    <?php if (has_permission('menu.delete')) : ?>
                                                        <button onclick="hapus('<?= base_url('menu/delete/' . $item['id']) ?>')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" href="#deleteModal"><i class="fa fa-trash"></i></button>
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

<?= $this->include('settings/menu/modal_data') ?>
<?= $this->endSection() ?>