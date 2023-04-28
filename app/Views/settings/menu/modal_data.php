<!-- Add  Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Menu Title</label>
                        <input type="text" name="menu_title" class="form-control" id="name" placeholder="Menu Title" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Sort Menu</label>
                        <input type="number" name="sort_menu" class="form-control" id="sort_menu" placeholder="Sort Menu" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Icon">
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Menu Url</label>
                        <input type="text" name="menu_url" class="form-control" id="icon" placeholder="Menu url">
                    </div> -->
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

<!-- Edit Contact Modal -->
<?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="editModal-<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/edit/' . $m['id']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Menu Title</label>
                            <input type="text" name="menu_title" class="form-control" id="menu_title" value="<?= $m['menu_title'] ?>" placeholder="Menu Title" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Sort Menu</label>
                            <input type="number" name="sort_menu" class="form-control" id="menu_title" value="<?= $m['sort_menu'] ?>" placeholder="Menu Title" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Icon</label>
                            <input type="text" name="icon" class="form-control" id="menu_title" value="<?= $m['icon'] ?>" placeholder="Icon">
                        </div>
                        <!-- <div class="form-group">
                            <label for="name">Icon</label>
                            <input type="text" name="menu_url" class="form-control" id="menu_title" value="<?= $m['menu_url'] ?>" placeholder="menu url">
                        </div> -->
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