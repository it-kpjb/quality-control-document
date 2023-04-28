<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class Menu extends BaseController
{

    protected $menu;

    function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $data['title'] = "Menu Managament";
        $data['menu'] = $this->menu->findAll();
        return view('settings/menu/index', $data);
    }

    public function create()
    {
        $post = $this->request->getPost();

        $this->menu->insert([
            'menu_title'        => $post['menu_title'],
            'sort_menu'         => $post['sort_menu'],
            'icon'              => $post['icon'],
            // 'menu_url'              => $post['menu_url'],

        ]);

        return redirect()->to('menu')->with('success', 'Menu Added Successfully');
    }

    public function edit($id)
    {
        $post = $this->request->getPost();
        $this->menu->update($id, [
            'menu_title'        => $post['menu_title'],
            'sort_menu'         => $post['sort_menu'],
            'icon'              => $post['icon'],
            // 'menu_url'              => $post['menu_url'],

        ]);

        return redirect()->to('menu')->with('info', 'Menu Updated Successfully');
    }

    public function delete($id)
    {
        $this->menu->delete($id);

        return redirect()->to('menu')->with('danger', 'Data Deleted Successfully');
    }
}
