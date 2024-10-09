<?php

use yii\db\Migration;

class m240925_132729_cr_new_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_news_type', [
            'id' => $this->primaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'status' => $this->integer()->defaultValue(9),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('s_news_type');
    }
}