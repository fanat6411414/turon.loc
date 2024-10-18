<?php

use yii\db\Migration;

class m241016_153606_cr_edu extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_edu', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'desc' => $this->char(255)->notNull(),
            'summ_kunduzgi' => $this->integer()->defaultValue(0),
            'summ_sirtqi' => $this->integer()->defaultValue(0),
            'type_edu' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(9),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_edu');
    }
}