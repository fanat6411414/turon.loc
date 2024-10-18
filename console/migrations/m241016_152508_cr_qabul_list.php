<?php

use yii\db\Migration;

class m241016_152508_cr_qabul_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_qabul_list', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'phone' => $this->char(255)->notNull(),
            'status' => $this->integer()->defaultValue(9),
            'type' => $this->integer()->notNull(),
            'edu_id' => $this->integer()->null(),
            'time' => $this->integer()->notNull(),
            'result' => $this->text()->null(),
            'result_time' => $this->integer()->null(),
            'admin' => $this->integer()->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_qabul_list');
    }
}