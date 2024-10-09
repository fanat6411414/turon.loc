<?php

use yii\db\Migration;

class m240906_172041_cr_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sys_user', [
            'id' => $this->primaryKey(),
            'login' => $this->string(255)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->unique()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(9),
            'role_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'uid' => $this->string(255)->null(),
            '_name' => $this->char(255)->notNull(),
            '_phone' => $this->char(255)->null(),
            'descreptions' => $this->text()->null(),
        ], $tableOptions);

        $this->addForeignKey('fk_user_role','sys_user', 'role_id', 'sys_role', 'id', 'CASCADE', 'CASCADE');

        $this->insert('sys_user', [
            'login' => 'superadmin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('fanat6411414@gmail.com'),
            'password_reset_token' => Yii::$app->security->generateRandomString() . '_' . time(),
            'status' => 10,
            'role_id' => 1,
            'created_at' => time(),
            '_name' => "Xalilov Abbos",
            '_phone' => 916411414,
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_user_role','sys_user');
        $this->dropTable('sys_user');
    }
}