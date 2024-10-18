<?php

use yii\db\Migration;

class m241016_150045_cr_qabull_call extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_qabul_call', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'title' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'url' => $this->char(255)->notNull(),
            '_tranlate' => $this->text()->null(),
            'status' => $this->integer()->defaultValue(9),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_qabul_call');
    }
}