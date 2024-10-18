<?php

use yii\db\Migration;

class m241016_161919_cr_managers extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_managers', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'phone' => $this->char(255)->notNull(),
            'email' => $this->char(255)->notNull(),
            'visiting_day' => $this->char(255)->notNull(),
            'about' => $this->char(255)->notNull(),
            'img' => $this->char(255)->notNull(),
            'time' => $this->integer()->notNull(),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_managers');
    }
}