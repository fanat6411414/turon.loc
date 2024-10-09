<?php

use yii\db\Migration;

class m240918_193009_cr_pages extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_pages', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'content' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
            'status' => $this->integer()->defaultValue(9),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_pages');
    }
}