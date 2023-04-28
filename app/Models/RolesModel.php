<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table      = 'auth_groups';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    public function joinPermissionAndGroup($id)
    {
        $query = $this->db->table('auth_groups_permissions agp')
            ->join('auth_permissions ap', 'agp.permission_id = ap.id')
            ->where('group_id', $id)
            ->get();
        return $query;
    }

    public function deleteAllPermissions($id)
    {
        $query = $this->db->table('auth_groups_permissions agp')
            ->where('group_id', $id)
            ->delete();
        return $query;
    }

    public function getMenu()
    {
        $query = $this->db->table('user_menu')
            ->get();
        return $query;
    }
}
