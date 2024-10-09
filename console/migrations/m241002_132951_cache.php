<?php

use yii\db\Migration;

class m241002_132951_cache extends Migration
{
    public function up()
    {
        $this->createTable('{{%cache}}', [
            'id' => $this->char(128)->notNull(),
            'expire' => $this->integer()->null(),
            'data' => 'BLOB',
        ]);

        $this->addPrimaryKey('pk-cache', '{{%cache}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%cache}}');
    }
}