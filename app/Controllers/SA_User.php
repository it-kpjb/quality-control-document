<?php

namespace App\Controllers;
use App\Models\User_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class SA_User extends BaseController
{

    public function index()
    {
        $user = new User_model();
        $data['user'] = $user->findAll();
        echo view('SuperAdmin/dashboardSuperAdmin', $data);
    }

    public function viewUser()
	{
		$user = new User_model();
		$data['user'] = $data->first();
        // echo view('SuperAdmin/dashboardSA', $data);
    }

    public function add()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $user = new User_Model();
            $user->insert([
                "username" => $this->request->getPost('username'),
                "password" => $this->request->getPost('password'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role')
                 
            ]);
            return redirect('SuperAdmin/addUser');
        }
		
        // tampilkan form create
        echo view('SuperAdmin/addUser');
    }

    //--------------------------------------------------------------------------
    
    public function edit($idUser)
    {
        // ambil artikel yang akan diedit
        $user = new User_Model();
        $data['user'] = $user->where('id User', $idUser)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id User' => 'required', //auto generate?
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $user->update($idUser, [
                "username" => $this->request->getPost('username'),
                "password" => $this->request->getPost('password'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role')
            ]);
            return redirect('SuperAdmin/addUser');
        }

        // tampilkan form edit
        echo view('SuperAdmin/editUser', $data);
    }

    //--------------------------------------------------------------------------

	public function delete($idUser){
        $user = new User_Model();
        $user->delete($idUser);
        return redirect('SuperAdmin/addUser');
    }

    
}