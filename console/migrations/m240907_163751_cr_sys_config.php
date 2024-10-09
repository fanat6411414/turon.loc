<?php

use yii\db\Migration;

class m240907_163751_cr_sys_config extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sys_config', [
            'id' => $this->bigPrimaryKey(),
            'phone' => $this->char(255)->null(),
            'email' => $this->char(255)->null(),
            'location' => $this->text()->null(),
            'file_upload_size' => $this->integer()->defaultValue(2),
            'tg_bot_token' => $this->text()->null(),
            'tg_channel' => $this->text()->null(),
            'fb_channel' => $this->text()->null(),
            'tw_channel' => $this->text()->null(),
            'in_channel' => $this->text()->null(),
            'youtube_channel' => $this->text()->null(),
            'instagram_channel' => $this->text()->null(),
            'seo_keywords' => $this->text()->null(),
            'seo_description' => $this->text()->null(),
        ], $tableOptions);
        $this->insert('sys_config', []);
    }

    public function safeDown()
    {
        $this->dropTable('sys_config');
    }
}