<?php

use yii\db\Migration;

class m240906_170435_cr_actions extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sys_actions', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'path' => $this->string(255)->notNull()->unique()
        ], $tableOptions);

        $this->insert('sys_actions', ['name' => 'Bosh sahifa', 'path' => 'site/index']);
        $this->insert('sys_actions', ['name' => 'Kitoblar ruyhati', 'path' => 'book/index']);
        $this->insert('sys_actions', ['name' => 'Kitob qo`shish', 'path' => 'book/create']);
        $this->insert('sys_actions', ['name' => 'Kitobni o`zgartirish', 'path' => 'book/update']);
        $this->insert('sys_actions', ['name' => 'Kitobni o`chirish', 'path' => 'book/delete']);
        $this->insert('sys_actions', ['name' => 'Kitobni ko`rish', 'path' => 'book/view']);
        $this->insert('sys_actions', ['name' => 'Adabiyot turi', 'path' => 'book-type/index']);
        $this->insert('sys_actions', ['name' => 'Adabiyot turi qo`shish', 'path' => 'book-type/create']);
        $this->insert('sys_actions', ['name' => 'Adabiyot turini o`zgartirish', 'path' => 'book-type/update']);
        $this->insert('sys_actions', ['name' => 'Adabiyot turini o`chirish', 'path' => 'book-type/delete']);
        $this->insert('sys_actions', ['name' => 'Adabiyot turini ko`rish', 'path' => 'book-type/view']);
        $this->insert('sys_actions', ['name' => 'Kategoriyalar', 'path' => 'category/index']);
        $this->insert('sys_actions', ['name' => 'Kategoriya qo`shish', 'path' => 'category/create']);
        $this->insert('sys_actions', ['name' => 'Kategoriyani o`zgartirish', 'path' => 'category/update']);
        $this->insert('sys_actions', ['name' => 'Kategoriyani o`chirish', 'path' => 'category/delete']);
        $this->insert('sys_actions', ['name' => 'Kategoriyani ko`rish', 'path' => 'category/view']);
        $this->insert('sys_actions', ['name' => 'Foydalanuvchi profili', 'path' => 'site/profil']);
        $this->insert('sys_actions', ['name' => 'Kitob holatlari', 'path' => 'book-status/index']);
        $this->insert('sys_actions', ['name' => 'Kitob holatini yaratish', 'path' => 'book-status/create']);
        $this->insert('sys_actions', ['name' => 'Kitob holatini o`zgartirish', 'path' => 'book-status/update']);
        $this->insert('sys_actions', ['name' => 'Kitob holatini o`chirish', 'path' => 'book-status/delete']);
        $this->insert('sys_actions', ['name' => 'Kitob kiritish', 'path' => 'book/add']);
        $this->insert('sys_actions', ['name' => 'Kitob yangilash', 'path' => 'book/update-list']);
        $this->insert('sys_actions', ['name' => 'Kitob inventarini o`chirish', 'path' => 'book/delete-list']);
        $this->insert('sys_actions', ['name' => 'Hemis orqali kiruvchilar ro`yhati', 'path' => 'users-card/hemis-index']);
        $this->insert('sys_actions', ['name' => 'Foydalanuvchilarni ko`rish', 'path' => 'users-card/view']);
        $this->insert('sys_actions', ['name' => 'Foydalanuvchini tasdiqlash', 'path' => 'users-card/verificated']);
        $this->insert('sys_actions', ['name' => 'Student tizimi orqali kiruvchilar ro`yhati', 'path' => 'users-card/student-index']);
        $this->insert('sys_actions', ['name' => 'Kitobni berish', 'path' => 'user-book/get']);
        $this->insert('sys_actions', ['name' => 'Kitobni qaytarib olish', 'path' => 'user-book/put']);
        $this->insert('sys_actions', ['name' => 'Kitobni olish holati', 'path' => 'user-book/view']);
        $this->insert('sys_actions', ['name' => 'Kitobni olishni tasdiqlash', 'path' => 'user-book/put-verificated']);
        $this->insert('sys_actions', ['name' => 'Inventar raqamlar', 'path' => 'book/view-inventar']);
        $this->insert('sys_actions', ['name' => 'RFID orqali foydalanuvchini aniqlash', 'path' => 'user-book/get-rfid']);
        $this->insert('sys_actions', ['name' => 'Inventar qidiruv', 'path' => 'book/inventar-search']);
        $this->insert('sys_actions', ['name' => 'Elektron biriktirilgan kitoblar', 'path' => 'book/files-list']);
        $this->insert('sys_actions', ['name' => 'Elektron biriktirilgan kitob qo`shish', 'path' => 'book/add-files']);
        $this->insert('sys_actions', ['name' => 'Elektron kitobni yuklash', 'path' => 'book/down-files']);
        $this->insert('sys_actions', ['name' => 'Elektron kitobni o`chirish', 'path' => 'book/delete-files']);
        $this->insert('sys_actions', ['name' => 'Audio biriktirilgan kitoblar', 'path' => 'book/audio-list']);
        $this->insert('sys_actions', ['name' => 'Audio biriktirilgan kitob qo`shish', 'path' => 'book/add-audio']);
        $this->insert('sys_actions', ['name' => 'Elektron kitobni yuklash', 'path' => 'book/down-audio']);
        $this->insert('sys_actions', ['name' => 'Elektron kitobni o`chirish', 'path' => 'book/delete-audio']);
    }

    public function safeDown()
    {
        $this->dropTable('sys_actions');
    }
}