<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Qcdoc extends Migration
{
    public function up()
    {
        //membuat kolom/field untuk tabel qcdoc
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'Dinda',
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['published','draft'],
                'default' => 'draft',
            ],
        ]);
        
        //Membuat primary key
        $this->forge->addKey('id',TRUE);

        //Membuat tabel qcdoc
        $this->forge->createTable('qcdoc',TRUE);
        
    }

    public function down()
    {
        //menghapus tabel qcdoc
        $this->forge->dropTable('qcdoc');
    }
}
