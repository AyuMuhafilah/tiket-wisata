<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_payment'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_admin'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'nama_bank'       => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'no_rek'    => [
                'type'       => 'CHAR',
                'constraint' => 15,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_payment', true);
        $this->forge->addForeignKey('id_admin', 'user', 'id_user', 'CASECADE', 'CASECADE');
        $this->forge->createTable('payment');
    }

    public function down()
    {
        $this->forge->dropTable('payment');
    }
}
