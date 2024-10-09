<?php

use yii\db\Migration;

class m240906_170320_cr_role extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sys_role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique()
        ], $tableOptions);

        $this->insert('sys_role', ['name' => 'superadmin']);
        $this->insert('sys_role', ['name' => 'admin']);
    }

    public function safeDown()
    {
        $this->dropTable('sys_role');
    }
}