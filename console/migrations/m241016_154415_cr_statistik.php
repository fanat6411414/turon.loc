<?php

use yii\db\Migration;

class m241016_154415_cr_statistik extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_statistik', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'create_year' => $this->integer()->defaultValue(0),
            'students' => $this->integer()->defaultValue(0),
            'edu' => $this->integer()->defaultValue(0),
            'faculty' => $this->integer()->defaultValue(0),
            'kafedra' => $this->integer()->defaultValue(0),
            'teacher' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->insert('s_statistik', ['alias' => md5(time())]);
    }

    public function safeDown()
    {
        $this->dropTable('s_statistik');
    }
}