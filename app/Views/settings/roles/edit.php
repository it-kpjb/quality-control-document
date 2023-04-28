<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="clearfix">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Roles Permission &nbsp; <h2 style="text-transform:capitalize;"><?= $role->name ?></h2>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- <form action=""> -->

                    <div class="row">
                        <?= $this->include('templates/alerts') ?>
                        <div class="col-sm-12">
                            <p style="padding-left: 2px;">
                                <input type="checkbox" name="check_all" value="check_all" class="parent" id="check_all">
                                <label class="form-check-label" for="check_all">check all</label>
                            </p>

                            <form method="POST" action="/roles/store_edit/<?= $role->id ?>">
                                <?= csrf_field() ?>
                                <?php foreach ($permissions as $key => $permission) : ?>
                                    <?php if ($key % 5 == 0) : ?>
                                        <p style="padding-left: 10px;">

                                            <input <?php
                                                    foreach ($array_groups as $group) {
                                                        echo ($group['name'] === $permission['name'] ? 'checked' : '');
                                                    } ?> class="form-check-input" data-group-parent="<?= $permission['description'] ?>" id="parent<?= $key ?>" type="checkbox" name="permission[]" value="<?= $permission['name'] ?>">
                                            <label class="form-check-label" for="parent<?= $key ?>">
                                                <?= $permission['name'] ?>
                                            </label>

                                        <?php else : ?>
                                        <p style="padding-left: 20px;">

                                            <input <?php
                                                    foreach ($array_groups as $group) {
                                                        echo ($group['name'] === $permission['name'] ? 'checked' : '');
                                                    } ?> class=" form-check-input" data-group="<?= $permission['description'] ?>" id="parent<?= $key ?>_child" type="checkbox" name="permission[]" value="<?= $permission['name'] ?>">
                                            <label class="form-check-label" for="parent<?= $key ?>_child">
                                                <?= $permission['name'] ?>
                                            </label>

                                        </p>
                                        </p>
                                    <?php endif ?>


                                <?php endforeach ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>

                            </form>
                        </div>
                    </div>
                    <!-- </form> -->

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        let checkAll = $("#check_all");
        let groupId = ''
        let data_json = <?= $permissions_json ?>;
        // console.log(data_json)
        for (let i = 0; i < data_json.length; i++) {
            let parentCheckboxGroup = $(`#parent${i}`);
            if (i % 5 == 0) {
                parentCheckboxGroup.change(function() {
                    groupId = $(this).attr('data-group-parent');
                    console.log(groupId)
                    let getChildElement = $('.form-check-input').filter(`[data-group="${groupId}"]`)
                    if ($(this).is(':checked')) {
                        getChildElement.prop('checked', true);
                    } else if (!getChildElement.length) {
                        parentCheckboxGroup.prop('checked', false)
                    } else {
                        getChildElement.prop('checked', false);

                    }
                })
            } else {
                let childCheckbox = $(`#parent${i}_child`)

                childCheckbox.change(function() {
                    let groupIdChild = $(this).attr('data-group');

                    let flagCheckbox = $('.form-check-input').filter(`[data-group="${groupIdChild}"]`).is(':checked')
                    let getParent = $('.form-check-input').filter(`[data-group-parent="${groupIdChild}"]`)
                    if ($(this).is(':checked')) {
                        getParent.prop('checked', true)
                    } else if (flagCheckbox == false) {
                        getParent.prop('checked', false)
                    }
                    checkAll.prop('checked', false)


                })
            }
        }

        checkAll.change(function() {
            if ($(this).is(':checked')) {
                $('.form-check-input').prop('checked', true);
            } else {
                $('.form-check-input').prop('checked', false);
            }
        })



    });
</script>

<?= $this->endSection() ?>