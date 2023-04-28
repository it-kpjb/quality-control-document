<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;
use App\Models\SubMenuModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class Roles extends BaseController
{
    protected $submenu;

    function __construct()
    {
        // $this->roles = new GroupModel();
        $this->authorize = $auth = service('authorization');
        $this->db = \Config\Database::connect();
        $this->permissions = new PermissionModel();
        $this->roles = $this->db->table('auth_groups');
        $this->permission = $this->db->table('auth_permissions');
        $this->groups_permission = new RolesModel();
    }

    public function index()
    {
        $data['roles'] = $this->roles->get()->getResultArray();
        $data['title'] = "List Role";
        return view('settings/roles/index', $data);
    }

    public function update($id)
    {
        $post = $this->request->getPost();
        $id = $post['id'];
        $this->roles->where('id', $id);
        $this->roles->update([
            'description'        => $post['description'],
        ]);

        return redirect()->to('roles')->with('info', 'Roles Updated Successfully');
    }
    public function create()
    {
        $post = $this->request->getPost();
        $response = $this->roles->insert([
            'name'           => $post['role'],
            'description'    => $post['description'],
        ]);
        return redirect()->to('roles')->with('success', 'Roles Added Successfully');
    }

    public function show_edit($id)
    {
        $data['groups'] = $this->groups_permission->joinPermissionAndGroup($id)->getResult();
        $data['role'] = $this->roles->where([
            'id' => $id
        ])->get()->getRow();
        $data['permissions'] = $this->permission->get()->getResultArray();
        // dd($data['permissions']);
        // dd($data['groups']);

        $array_groups = array();
        foreach ($data['groups'] as $groups) {
            $array_groups[] = [
                'id' => $groups->permission_id,
                'name' => $groups->name
            ];
        }
        $data['array_groups'] = $array_groups;
        // dd($array_groups);
        // dd($data['array_groups']);
        $data['permissions_json'] = json_encode($data['permissions']);
        return view('settings/roles/edit', $data);
    }

    public function store_edit($id)
    {

        $checklist = [];
        if ($this->request->getPost()) {
            $getPost = $this->request->getPost();
            if (empty($getPost['permission'])) {
                $this->groups_permission->deleteAllPermissions($id);
            } else {
                $count_total = count($getPost['permission']);
                if ($count_total > 0) {
                    $this->groups_permission->deleteAllPermissions($id);
                    foreach ($getPost['permission'] as $key => $value) {
                        $checklist[$key] = [
                            'permission_id'   => $value,
                            'group_id' => $id
                        ];
                        $this->authorize->addPermissionToGroup($value, $id);
                    }
                }
                return redirect()->to('roles')->with('info', 'Roles Updated Successfully');
            }
        }
        return redirect()->to('roles')->with('info', 'Roles Updated Successfully');

        // dd($checklist);


        // $this->authorize->addPermissionToGroup($data);
        // $this->authorize->removePermissionFromGroup('menu', $id);
    }

    public function edit($id)
    {
        $post = $this->request->getPost();
        $this->submenu->update($id, [
            'menu_id'           => $post['menu_id'],
            'sub_title'         => $post['sub_title'],
            'url'               => $post['url'],
            'icon'              => $post['icon'],
            'is_active'         => empty($post['is_active']) ? '' : $post['is_active'],
            'sort_menu'         => $post['sort_menu'],
        ]);
        return redirect()->to('submenu')->with('info', 'Sub Menu Updated Successfully');
    }

    public function delete($id)
    {
        $this->roles->delete(['id' => $id]);
        return redirect()->to('roles')->with('danger', 'Roles Deleted Successfully');
    }
}
