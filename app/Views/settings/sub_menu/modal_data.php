<!-- Add  Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('submenu') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Sub Menu Title</label>
                        <input type="text" name="sub_title" class="form-control" id="name" placeholder="Menu Title" required>
                    </div>
                    <div class="form-group ">
                        <label>Menu</label>
                        <select name="menu_id" class="form-control selectric" id="menu_id">
                            <option value="">--Pilih Menu--</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m->id ?>"><?= $m->menu_title ?></option>
                            <?php endforeach  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Url</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="Menu Title" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Icon">
                    </div> -->
                    <div class="form-group">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Sort Menu</label>
                        <input type="number" name="sort_menu" class="form-control" id="name" placeholder="Sort Menu" required>
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

<!-- Edit Contact Modal -->
<?php foreach ($sub_menu as $sm) : ?>
    <div class="modal fade" id="editModal-<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('submenu/edit/' . $sm['id']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Sub Menu Title</label>
                            <input type="text" name="sub_title" class="form-control" id="name" placeholder="Menu Title" value="<?= $sm['sub_title'] ?>" required>
                        </div>
                        <div class="form-group ">
                            <label>Menu</label>
                            <select name="menu_id" class="form-control selectric" id="">
                                <option value="">--Pilih Menu--</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option <?= ($sm['menu_id'] ==  $m->id) ? 'selected' : ''  ?> value="<?= $m->id ?>">
                                        <?= $m->menu_title ?></option>
                                <?php endforeach  ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="name">Url</label>
                            <input readonly type="text" name="url" class="form-control" id="name" placeholder="Menu Title" required value="<?= $sm['url'] ?>">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="name">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Icon">
                        </div> -->
                        <div class="form-group">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" <?= $sm['is_active'] == 1 ? 'checked' : '' ?> />
                                <label class="form-check-label" for="is_active">Active?</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Sort Menu</label>
                            <input type="number" name="sort_menu" class="form-control" id="name" placeholder="Sort Menu" value="<?= $sm['sort_menu'] ?>" required>
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