<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "kategori";

    public function rules()
    {
        return [
            

            ['field' => 'nama_kategori',
            'label' => 'Nama Kategori',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($idKategori)
    {
        return $this->db->get_where($this->_table, ["idKategori" => $idKategori])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idKategori = $post["idKategori"];
        $this->nama_kategori = $post["nama_kategori"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idKategori = $post["idKategori"];
        $this->nama_kategori = $post["nama_kategori"];

        return $this->db->update($this->_table, $this, array('idKategori' => $post['idKategori']));
    }

    public function delete($idKategori)
    {
        return $this->db->delete($this->_table, array("idKategori" => $idKategori));
    }
}