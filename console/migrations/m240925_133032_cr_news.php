<?php

use yii\db\Migration;

class m240925_133032_cr_news extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_news', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'image' => $this->bigInteger()->null(),
            'content' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
            'status' => $this->integer()->defaultValue(9),
            '_tranlate' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'news_type' => $this->integer()->null(),
        ], $tableOptions);
        $this->addForeignKey('fk_news_newstype', 's_news', 'news_type', 's_news_type', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_news_image', 's_news', 'image', 's_files', 'id', 'SET NULL', 'SET NULL');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_news_newstype', 's_news');
        $this->dropForeignKey('fk_news_image', 's_news');
        $this->dropTable('s_news');
    }
}