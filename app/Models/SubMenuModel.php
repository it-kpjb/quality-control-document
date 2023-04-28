<?php

namespace App\Models;

use CodeIgniter\Model;

class SubMenuModel extends Model
{
    protected $table      = 'user_sub_menu';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['menu_id', 'sub_title', 'url', 'is_active', 'sort_menu'];

    public function joinMenu()
    {
        $query = $this->db->table('user_menu m')
            ->join('user_sub_menu sm', 'm.id = sm.menu_id')
            ->orderBy('sm.menu_id', 'asc')
            ->orderBy('sm.sort_menu', 'asc')
            ->get();
        return $query;
    }

    public function getMenu()
    {
        $query = $this->db->table('user_menu')
            ->get();
        return $query;
    }

    function getMenuId($menu_id)
    {
        $query = $this->db->table('user_menu')
            ->getWhere(['id' => $menu_id]);
        return $query;
    }
}
