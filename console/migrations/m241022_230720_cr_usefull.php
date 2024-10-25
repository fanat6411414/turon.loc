<?php

use yii\db\Migration;

class m241022_230720_cr_usefull extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_usefull', [
            'id' => $this->primaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'img_id' => $this->bigInteger()->notNull(),
            'position' => $this->integer()->defaultValue(0),
            'url' => $this->char(255)->notNull(),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_usefull');
    }
}