<?php

use yii\db\Migration;

class m241003_105821_cr_menu_footer extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('s_menu_footer', [
            'id' => $this->bigPrimaryKey(),
            'alias' => $this->char(255)->notNull(),
            'name' => $this->char(255)->notNull(),
            'type' => $this->integer()->null(),
            'page_id' => $this->bigInteger()->null(),
            'action' => $this->char(255)->null(),
            'url' => $this->char(255)->null(),
            '_tranlate' => $this->text()->null(),
            'status' => $this->integer()->defaultValue(9),
        ], $tableOptions);
        $this->addForeignKey('fk_menufooter_pages', 's_menu_footer', 'page_id', 's_pages', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_menufooter_pages', 's_menu_footer');
        $this->dropTable('s_menu_footer');
    }
}