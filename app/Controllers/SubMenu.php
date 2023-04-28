<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubMenuModel;
use Myth\Auth\Models\PermissionModel;

class SubMenu extends BaseController
{
    protected $submenu;

    function __construct()
    {
        $this->submenu = new SubMenuModel();
        $this->permissions = new PermissionModel();
        $this->authorize = $auth = service('authorization');
        $this->db = \Config\Database::connect();
        $this->permission = $this->db->table('auth_permissions');
    }

    function getMenuId()
    {
        $post = $this->request->getVar();
        $category_id = $post['id'];
        $data = $this->submenu->getMenuId($category_id)->getResult();
        echo json_encode($data);
    }
    public function index()
    {
        // $data['sub_menu'] = $this->submenu->findAll();
        $data['title'] = "List Submenu";
        $data['sub_menu'] = $this->submenu->joinMenu()->getResultArray();
        $data['menu'] = $this->submenu->getMenu()->getResult();

        return view('settings/sub_menu/index', $data);
    }

    public function create()
    {
        $post = $this->request->getPost();
        $response = $this->submenu->insert([
            'menu_id'           => $post['menu_id'],
            'sub_title'         => $post['sub_title'],
            'url'               => $post['url'],
            // 'icon'              => $post['icon'],
            'is_active'         => $post['is_active'],
            'sort_menu'         => $post['sort_menu'],
        ]);
        if ($response) {
            $this->permissions->insert([
                'name'          => $post['url'],
                'description'   =>  $this->submenu->getInsertID()
            ]);
            $this->permissions->insert([
                'name'          => $post['url'] . '.create',
                'description'   => $this->submenu->getInsertID()
            ]);
            $this->permissions->insert([
                'name'          => $post['url'] . '.view',
                'description'   =>  $this->submenu->getInsertID()
            ]);
            $this->permissions->insert([
                'name'          => $post['url'] . '.delete',
                'description'   =>  $this->submenu->getInsertID()
            ]);
            $this->permissions->insert([
                'name'          => $post['url'] . '.edit',
                'description'   =>  $this->submenu->getInsertID()
            ]);
        }

        return redirect()->to('submenu')->with('success', 'Sub Menu Added Successfully');
    }

    public function edit($id)
    {
        $post = $this->request->getPost();
        $this->submenu->update($id, [
            'menu_id'           => $post['menu_id'],
            'sub_title'         => $post['sub_title'],
            // 'url'               => $post['url'],
            // 'icon'              => $post['icon'],
            'is_active'         => empty($post['is_active']) ? '' : $post['is_active'],
            'sort_menu'         => $post['sort_menu'],
        ]);
        return redirect()->to('submenu')->with('info', 'Sub Menu Updated Successfully');
    }

    public function delete($id)
    {
        $delete = $this->submenu->delete($id);
        if ($delete) {
            $this->permission->delete(['description' => $id]);
        }
        return redirect()->to('submenu')->with('danger', 'Sub Menu Deleted Successfully');
    }
}
