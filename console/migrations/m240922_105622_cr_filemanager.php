<?php

use yii\db\Migration;

class m240922_105622_cr_filemanager extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_files', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->null(),
            '_filename' => $this->char(255)->notNull(),
            '_extension' => $this->char(10)->notNull(),
            'type' => $this->char(50)->notNull(),
            '_size' => $this->bigInteger()->defaultValue(0),
            'status' => $this->integer()->defaultValue(9),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_files');
    }
}