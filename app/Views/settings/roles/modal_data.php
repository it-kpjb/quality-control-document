<!-- Add  Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('roles') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Roles Title</label>
                        <input type="text" name="role" class="form-control" id="name" placeholder="Roles Title" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Description" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add modal -->

<!-- Add  Modal -->
<?php foreach ($roles as $role) : ?>
    <div class="modal fade" id="editModal-<?= $role['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('roles/update/' . $role['id']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="text" name="id" hidden value="<?= $role['id'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Roles Title</label>
                            <input readonly type="text" name="role" class="form-control" id="name" placeholder="Roles Title" value="<?= $role['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="<?= $role['description'] ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end add modal -->