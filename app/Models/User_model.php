<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'idUser';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'password', 'email', 'role'];

    public function get_all()
    {
        $this->select('user.*, role.role, uu.name as username');
        return $this->get()->getResultArray();
    }

    public function get_user_by_role($id_role)
    {
        $this->where('id_role', $id_role);
        return $this->get()->getResultArray();
    }

    public function get_user_by_id($id)
    {
        $this->where('id', $id);
        return $this->first();
    }

    public function get_with_par_by_id($id)
    {
        $this->select('user.*, p.name as par_name, p.email as par_email');
        $this->join('participants as p', 'user.id = p.id_user', 'left');
        $this->where('user.id', $id);
        return $this->first();
    }

    public function get_user_by_email($email)
    {
        $this->select('u.*, r.role');
        $this->from('user u');
        $this->join('role r', 'u.id_role = r.id', 'left');
        $this->where('u.email', $email);
        $this->where('u.status', 'active');
        return $this->first();
    }

    public function store($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function role()
    {
        return $this->db->get('role')->result();
    }
}