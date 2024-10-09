<?php

use yii\db\Migration;

class m240906_171910_cr_role_action extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sys_role_action', [
            'role_id' => $this->integer(),
            'actions_id' => $this->integer()
        ], $tableOptions);

        $this->addForeignKey('fk_role_roleaction','sys_role_action', 'role_id', 'sys_role', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_action_roleaction','sys_role_action', 'actions_id', 'sys_actions', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_role_roleaction','sys_role_action');
        $this->dropForeignKey('fk_action_roleaction','sys_role_action');
        $this->dropTable('sys_role_action');
    }
}