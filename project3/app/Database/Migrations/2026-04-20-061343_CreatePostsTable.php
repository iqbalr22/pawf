<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        // Create columns/fields for the posts table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'author'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'default'        => 'John Doe',
            ],
            'content' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['published', 'draft'],
                'default'        => 'draft',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        // Create primary key
        $this->forge->addKey('id', TRUE);

        // Create the posts table
        $this->forge->createTable('posts', TRUE);
    }

    public function down()
    {
        // Drop the posts table
        $this->forge->dropTable('posts');
    }
}
