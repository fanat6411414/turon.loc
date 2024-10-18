<?php

use yii\db\Migration;

class m241018_174513_cr_manager extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_manager', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'manager_id' => $this->bigInteger()->null(),
            'about' => $this->text()->null(),
            'position' => $this->integer()->defaultValue(0),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
        ], $tableOptions);
        $this->addForeignKey('fk_managers_manager', 's_manager', 'manager_id', 's_managers', 'id', 'SET NULL', 'SET NULL');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_managers_manager', 's_manager');
        $this->dropTable('s_manager');
    }
}