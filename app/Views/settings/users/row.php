<style>
    .icon-success {
        color: #1cc88a !important;
    }

    .icon-danger {
        color: #e74a3b !important;
    }
</style>
<tr>
    <td><?= (in_groups('superadmin')|| in_groups('qcdoc')) ? $key  : '1' ?></td>
    <td><?= $row->username; ?></td>
    <td><?= empty($group) ? '' : $group[0]['name']; ?></td>

    <td><?= $row->email; ?></td>
    <?php if (in_groups('superadmin')) : ?>

        <td align="center">
            <a href="#" class="btn  btn-active-users" data-id="<?= $row->id; ?>" data-active="<?= $row->active == 1 ? 1 : 0; ?>" title="Klik untuk Mengaktifkan atau Menonaktifkan">
                <?= $row->active == 1 ? '<i style="color:#1cc88a" class="icon-success fa fa-check-circle"></i>' : '<i style="color:#e74a3b" class="icon-danger fa fa-times-circle"></i>'; ?>
            </a>
        </td>
    <?php endif ?>
    <td align="center">
        <?php if (in_groups('superadmin')|| in_groups('qcdoc') ) : ?>
            <a href="<?= base_url(); ?>/users/edit/<?= $row->id; ?>" class="btn btn-info  btn-sm" title="Ubah Data user">
                <i class="fa fa-edit"></i>
            </a>
            <a href="<?= base_url(); ?>/users/change-password/<?= $row->id; ?>" class="btn btn-warning  btn-sm" title="Ubah Password">
                <i class="fa fa-key"></i>
            </a>
            <a href="#" class="btn btn-success  btn-sm btn-change-group" data-id="<?= $row->id; ?>" title="Ubah Grup">
                <i class="fa fa-tasks"></i>
            </a>
            <?php if ($row->id != user_id()) : ?>
                <button href="#deleteModal" onclick="hapus('<?= base_url('users/delete/' . $row->id) ?>')" title="delete" class="btn btn-danger  btn-sm" data-id="<?= $row->id; ?>"> <i class=" fa fa-trash"></i></button>
            <?php endif; ?>
        <?php else : ?>
            <a href="<?= base_url(); ?>/users/edit/<?= $row->id; ?>" class="btn btn-info  btn-sm" title="Ubah Data user">
                <i class="fa fa-edit"></i>
            </a>
            <a href="<?= base_url(); ?>/users/change-password/<?= $row->id; ?>" class="btn btn-warning  btn-sm" title="Ubah Password">
                <i class="fa fa-key"></i>
            </a>
        <?php endif; ?>
    </td>
</tr>